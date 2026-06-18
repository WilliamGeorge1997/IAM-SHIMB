<?php

declare(strict_types=1);

namespace Modules\Assessment\Services;

class RankingService
{
    /**
     * Determines the certification level based on the earned points percentage.
     *
     * @param float|int $percentage
     * @return string
     */
    public function getRank(float|int $percentage): string
    {
        if ($percentage >= 80) {
            return 'Platinum';
        }

        if ($percentage >= 60) {
            return 'Gold';
        }

        if ($percentage >= 50) {
            return 'Silver';
        }

        if ($percentage >= 40) {
            return 'Bronze';
        }

        return 'No Rank';
    }

    /**
     * Get the badge color for a specific rank.
     *
     * @param string $rank
     * @return string
     */
    public function getBadgeColor(string $rank): string
    {
        return match ($rank) {
            'Platinum' => 'background: linear-gradient(135deg, #e5e4e2 0%, #b0b0b0 100%); color: #333;',
            'Gold' => 'background: linear-gradient(135deg, #ffd700 0%, #d4af37 100%); color: #fff;',
            'Silver' => 'background: linear-gradient(135deg, #c0c0c0 0%, #a9a9a9 100%); color: #fff;',
            'Bronze' => 'background: linear-gradient(135deg, #cd7f32 0%, #a0522d 100%); color: #fff;',
            default => 'background: #f8f9fa; color: #6c757d; border: 1px solid #dee2e6;',
        };
    }
}
