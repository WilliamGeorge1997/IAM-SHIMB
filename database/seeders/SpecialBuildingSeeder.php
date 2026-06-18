<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Assessment\App\Models\Item;    
use Modules\Assessment\App\Models\ItemEarnedPoint;
use Modules\Assessment\App\Models\AssessmentGroup;
use Modules\Build\App\Models\MegaBuilding;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;

use PhpOffice\PhpSpreadsheet\IOFactory;

class SpecialBuildingSeeder extends Seeder
{
    private array $itemMap = [];
    // format: group_name|item_name => item_id

    private int $buildingTypeId = 9;

    public function run(): void
    {
        $filePath = database_path('seeders/files/special-building.xlsx');

        $spreadsheet = IOFactory::load($filePath);

        $this->seedMetadata($spreadsheet);
        $this->seedCaseSheets($spreadsheet);
    }

    /**
     * =========================
     * 1. METADATA SHEET
     * =========================
     */
    private function seedMetadata($spreadsheet): void
    {
        $sheet = $spreadsheet->getSheetByName('DB - Special Building');

        if (!$sheet) {
            throw new \Exception("Metadata sheet not found");
        }

        $highestRow = $sheet->getHighestRow();

        // Row 11 = headers, Row 12+ = data
        // C4 = Assessment Group | C5 = Item Name | C6 = Description
        // C7 = Classification   | C8 = Type      | C9 = Available Points
        $dataStartRow = 12;

        for ($row = $dataStartRow; $row <= $highestRow; $row++) {

            $groupName = trim((string)$sheet->getCell('D' . $row)->getValue());
            $itemName  = trim((string)$sheet->getCell('E' . $row)->getValue());

            if (!$groupName || !$itemName) {
                continue;
            }

            $group = $this->getOrCreateGroup($groupName);

            $description    = (string)$sheet->getCell('F' . $row)->getValue();
            $classification = (string)$sheet->getCell('G' . $row)->getValue();
            $type           = (string)$sheet->getCell('H' . $row)->getValue();
            $apRaw          = $sheet->getCell('I' . $row)->getValue();
            $availablePoints = is_numeric($apRaw) ? (float)$apRaw : 0;

            $item = Item::updateOrCreate(
                [
                    'name'                => $itemName,
                    'assessment_group_id' => $group->id,
                    'building_type_id'    => $this->buildingTypeId,
                ],
                [
                    'description'      => $description,
                    'classification'   => $classification ?: 'Sustainable',
                    'type'             => $type ?: 'Optional',
                    'available_points' => $availablePoints,
                ]
            );

            $key = $this->makeKey($group->name, $itemName);
            $this->itemMap[$key] = $item->id;
        }
    }

    /**
     * =========================
     * 2. CASE SHEETS
     * =========================
     */
    private function seedCaseSheets($spreadsheet): void
    {
        foreach ($spreadsheet->getSheetNames() as $sheetName) {

            if ($sheetName === 'DB - Special Building') {
                continue;
            }

            $sheet = $spreadsheet->getSheetByName($sheetName);
            if (!$sheet) continue;

            $buildingName = $this->extractBuildingName($sheetName);

            $megaBuilding = MegaBuilding::firstOrCreate([
                'name' => $buildingName
            ]);

            $this->importCaseSheet($sheet, $megaBuilding);
        }
    }

    /**
     * =========================
     * 3. IMPORT SINGLE CASE SHEET
     * =========================
     */
    private function importCaseSheet($sheet, MegaBuilding $megaBuilding): void
    {
        $highestRow = $sheet->getHighestRow();

        // Row 11 = headers, Row 12+ = data
        // D = Assessment Group | E = Item Name | J = Earned Points
        $dataStartRow = 12;

        for ($row = $dataStartRow; $row <= $highestRow; $row++) {

            $groupName = trim((string)$sheet->getCell('D' . $row)->getValue());
            $itemName  = trim((string)$sheet->getCell('E' . $row)->getValue());

            if (!$groupName || !$itemName) {
                continue;
            }

            $earnedPointsRaw = $sheet->getCell('J' . $row)->getValue();
            $earnedPoints = is_numeric($earnedPointsRaw) ? (float)$earnedPointsRaw : 0;

            $key = $this->makeKey($groupName, $itemName);

            if (!isset($this->itemMap[$key])) {
                continue;
            }

            $itemId = $this->itemMap[$key];

            // RULE:
            // Essential always included
            // Optional only if earned exists
            if (empty($earnedPointsRaw) && !$this->isEssential($itemId)) {
                continue;
            }

            ItemEarnedPoint::updateOrCreate(
                [
                    'mega_building_id' => $megaBuilding->id,
                    'building_type_id' => $this->buildingTypeId,
                    'item_id' => $itemId,
                ],
                [
                    'earned_points' => $earnedPoints,
                ]
            );
        }
    }

    /**
     * =========================
     * HELPERS
     * =========================
     */

    private function getOrCreateGroup(string $name): AssessmentGroup
    {
        $cleanName = trim(preg_replace('/\s+/', ' ', $name));
        return AssessmentGroup::firstOrCreate([
            'name' => $cleanName,
            'building_type_id' => $this->buildingTypeId,
        ]);
    }

    private function extractBuildingName(string $sheetName): string
    {
        return trim(preg_replace('/Case\s*\d+\s*-\s*/i', '', $sheetName));
    }

    private function makeKey(string $group, string $item): string
    {
        return $this->normalize($group) . '|' . $this->normalize($item);
    }

    private function normalize(string $value): string
    {
        return strtolower(trim(preg_replace('/\s+/', ' ', $value)));
    }

    /**
     * You can replace this with DB logic if needed
     */
    private function isEssential(int $itemId): bool
    {
        return Item::where('id', $itemId)
            ->where('type', 'Essential')
            ->exists();
    }
}
