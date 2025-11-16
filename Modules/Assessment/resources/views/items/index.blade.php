@extends('common::layouts.dashboard.master')

@section('css')
    <style>
        .table-item-row {
            transition: background-color 0.2s;
        }

        .table-item-row:hover {
            background-color: #f8f9fa !important;
        }

        .percentage-display {
            font-weight: 600;
            min-width: 70px;
            display: inline-block;
        }

        .form-check.form-switch .form-check-input {
            width: 3rem;
            height: 1.5rem;
            cursor: pointer;
        }

        .form-check.form-switch .form-check-input:checked {
            background-color: #1976d2;
            border-color: #1976d2;
        }
    </style>
@endsection

@section('content')
    <div class="container-fluid py-2">
        <!-- Dashboard Header -->
        <div class="bg-gradient-primary text-white rounded-3 p-2 mb-2 shadow"
            style="background: linear-gradient(135deg, #1976d2 0%, #64b5f6 100%);">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center">
                <div>
                    <h1 class="h6 fw-semibold mb-0">
                        <i class="bi bi-list-check me-1" style="font-size: 0.9rem;"></i>
                        Group Items
                    </h1>
                    <p class="mb-0 opacity-75" style="font-size: 0.75rem;">Please Choose and Earn Points From the Below
                        Available Points List - noting that the essential items (E) are mandatory</p>
                </div>
                <div class="mt-2 mt-md-0 d-flex gap-2">
                    <a href="{{ route('index') }}" class="btn btn-light btn-sm rounded-pill d-flex align-items-center"
                        style="font-size: 0.8rem; padding: 0.25rem 0.75rem;">
                        <i class="bi bi-house-door me-1"></i>
                        Home
                    </a>
                    <a href="{{ route('assessment-groups.index', [$megaBuilding, $buildingType]) }}"
                        class="btn btn-light btn-sm rounded-pill d-flex align-items-center"
                        style="font-size: 0.8rem; padding: 0.25rem 0.75rem;">
                        <i class="bi bi-arrow-left me-1"></i>
                        Back to Assessment Groups
                    </a>
                </div>
            </div>
        </div>

        <!-- Context Information Bar -->
        <div class="mb-2">
            <div
                class="d-flex flex-column flex-md-row align-items-md-center gap-2 p-2 bg-white rounded-2 shadow-sm border border-light">
                <div class="d-flex align-items-center gap-2 flex-wrap">
                    <a href="{{ route('mega-buildings.index') }}" class="text-decoration-none context-item-hover">
                        <div class="d-flex align-items-center gap-2">
                            <div class="bg-primary bg-opacity-10 rounded-circle p-1">
                                <i class="bi bi-building text-primary" style="font-size: 0.85rem;"></i>
                            </div>
                            <div>
                                <div class="text-muted fw-semibold text-uppercase"
                                    style="font-size: 0.65rem; letter-spacing: 0.5px;">Mega Building</div>
                                <div class="fw-bold text-dark" style="font-size: 0.85rem;">{{ $megaBuilding->name }}</div>
                            </div>
                        </div>
                    </a>
                    <div class="vr d-none d-md-block" style="height: 30px;"></div>
                    <a href="{{ route('building-types.index', ['mega_building' => $megaBuilding->id]) }}"
                        class="text-decoration-none context-item-hover">
                        <div class="d-flex align-items-center gap-2">
                            <div class="bg-info bg-opacity-10 rounded-circle p-1">
                                <i class="bi bi-building-check text-info" style="font-size: 0.85rem;"></i>
                            </div>
                            <div>
                                <div class="text-muted fw-semibold text-uppercase"
                                    style="font-size: 0.65rem; letter-spacing: 0.5px;">Building Type</div>
                                <div class="fw-bold text-dark" style="font-size: 0.85rem;">{{ $buildingType->name }}</div>
                            </div>
                        </div>
                    </a>
                    <div class="vr d-none d-md-block" style="height: 30px;"></div>
                    <a href="{{ route('assessment-groups.index', ['mega_building' => $megaBuilding->id, 'building_type' => $buildingType->id]) }}"
                        class="text-decoration-none context-item-hover">
                        <div class="d-flex align-items-center gap-2">
                            <div class="bg-info bg-opacity-10 rounded-circle p-1">
                                <i class="bi bi-list-check text-info" style="font-size: 0.85rem;"></i>
                            </div>
                            <div>
                                <div class="text-muted fw-semibold text-uppercase"
                                    style="font-size: 0.65rem; letter-spacing: 0.5px;">Assessment Group</div>
                                <div class="fw-bold text-dark" style="font-size: 0.85rem;">{{ $assessmentGroup->name }}
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <!-- Gauges Section -->
        <div class="card shadow rounded-3 border-0 mb-2 py-2 px-2">
            <div class="card-header bg-transparent border-0 pb-0">
                <h2 class="h6 mb-0 fw-semibold d-flex align-items-center">
                    <i class="bi bi-speedometer2 text-primary me-1" style="font-size: 0.9rem;"></i>
                    Performance Metrics
                </h2>
            </div>
            <div class="card-body">
                <!-- Gauges Container -->
                <div class="d-flex flex-column flex-lg-row gap-3">
                    <!-- First Flex: Mega Building Gauge -->
                    <div class="d-flex flex-column flex-lg-3">
                        <h6 class="fw-semibold mb-2 text-muted" style="font-size: 0.75rem; letter-spacing: 0.5px;">
                            <i class="bi bi-info-circle me-1"></i>For Full Mega Building
                        </h6>
                        <div class="text-center p-3 bg-light rounded-3 h-100">
                            <h6 class="fw-semibold mb-3" style="font-size: 0.85rem; color: #6c757d;">
                                Mega Building
                            </h6>
                            <div id="gauge-mega-building" style="width: 100%; height: 200px;"></div>
                        </div>
                        <!-- Vertical Divider -->
                    </div>

                    <!-- Second Flex: Other 3 Gauges -->
                    <div class="d-flex flex-column flex-lg-9">
                        <h6 class="fw-semibold mb-2 text-muted" style="font-size: 0.75rem; letter-spacing: 0.5px;">
                            <i class="bi bi-info-circle me-1"></i>For This Assessment Group: <span
                                class="fw-semibold">{{ $assessmentGroup->name }}</span>
                        </h6>
                        <div class="d-flex flex-column flex-md-row gap-3">
                            <!-- Sustainable Gauge -->
                            <div class="flex-fill position-relative">
                                <div class="text-center p-3 bg-light rounded-3 h-100">
                                    <h6 class="fw-semibold mb-3 classification-sustainable" style="font-size: 0.85rem;">
                                        Sustainable
                                    </h6>
                                    <div id="gauge-sustainable" style="width: 100%; height: 200px;"></div>
                                </div>
                                <!-- Vertical Divider -->
                                <div class="vr position-absolute top-0 end-0 d-none d-md-block"
                                    style="height: 100%; width: 1px; background-color: #dee2e6;"></div>
                            </div>
                            <!-- Intelligent Gauge -->
                            <div class="flex-fill position-relative">
                                <div class="text-center p-3 bg-light rounded-3 h-100">
                                    <h6 class="fw-semibold mb-3 classification-intelligent" style="font-size: 0.85rem;">
                                        Intelligent
                                    </h6>
                                    <div id="gauge-intelligent" style="width: 100%; height: 200px;"></div>
                                </div>
                                <!-- Vertical Divider -->
                                <div class="vr position-absolute top-0 end-0 d-none d-md-block"
                                    style="height: 100%; width: 1px; background-color: #dee2e6;"></div>
                            </div>
                            <!-- Healthy Gauge -->
                            <div class="flex-fill">
                                <div class="text-center p-3 bg-light rounded-3 h-100">
                                    <h6 class="fw-semibold mb-3 classification-healthy" style="font-size: 0.85rem;">
                                        Healthy
                                    </h6>
                                    <div id="gauge-healthy" style="width: 100%; height: 200px;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Items Table Section -->
        <div class="card shadow rounded-3 border-0 mb-2 py-2 px-2">
            <div class="card-header bg-transparent border-0 pb-0 d-flex justify-content-between align-items-center">
                <h2 class="h6 mb-0 fw-semibold d-flex align-items-center">
                    <i class="bi bi-list-check text-primary me-1" style="font-size: 0.9rem;"></i>
                    Group Items
                </h2>
            </div>
            <div class="card-body p-0 container my-2">
                @if ($items->isNotEmpty())
                    <form method="POST" id="earned-points-form"
                        action="{{ route('items.store-earned-points', [$megaBuilding, $buildingType, $assessmentGroup]) }}">
                        @csrf
                        <div class="table-responsive">
                            <table class="table align-middle mb-0 table-borderless" style="font-size: 0.8rem;">
                                <thead class="table-light">
                                    <tr>
                                        <th class="fw-semibold text-secondary"
                                            style="font-size: 0.75rem; padding: 0.5rem;">
                                            SR
                                        </th>
                                        <th class="fw-semibold text-secondary"
                                            style="font-size: 0.75rem; padding: 0.5rem;">
                                            Group Items</th>
                                        <th class="fw-semibold text-secondary"
                                            style="font-size: 0.75rem; padding: 0.5rem;">
                                            Item
                                            Description</th>
                                        <th class="fw-semibold text-secondary"
                                            style="font-size: 0.75rem; padding: 0.5rem;">
                                            Item
                                            Classification</th>
                                        <th class="fw-semibold text-secondary"
                                            style="font-size: 0.75rem; padding: 0.5rem;">
                                            Item
                                            Type</th>
                                        <th class="fw-semibold text-secondary text-center"
                                            style="font-size: 0.75rem; padding: 0.5rem;">Available Points (AP)</th>
                                        <th class="fw-semibold text-secondary text-center"
                                            style="font-size: 0.75rem; padding: 0.5rem;">Earned Points (EP)</th>
                                        <th class="fw-semibold text-secondary text-center"
                                            style="font-size: 0.75rem; padding: 0.5rem;">Earned Points (EP) %</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($items as $item)
                                        @php
                                            $classificationClass =
                                                'classification-' . strtolower($item->classification);
                                            $isEssential = $item->type === 'Essential';
                                            $itemId = 'item-' . $item->id;
                                            $toggleId = 'toggle-' . $item->id;
                                            $percentageId = 'percentage-' . $item->id;
                                            $earnedPoint = $earnedPoints[$item->id] ?? null;

                                            $currentToggleValue = 0;
                                            if ($earnedPoint) {
                                                if ($isEssential) {
                                                    $currentToggleValue = 1;
                                                } else {
                                                    $currentToggleValue =
                                                        $earnedPoint['earned_points'] >= $item->available_points
                                                            ? 1
                                                            : 0;
                                                }
                                            }
                                            $currentPercentage = '-';
                                            if ($isEssential) {
                                                $currentPercentage = $currentToggleValue === 1 ? '100.00%' : '0%';
                                            } elseif ($earnedPoint && $item->available_points > 0) {
                                                $currentPercentage =
                                                    number_format(
                                                        ($earnedPoint['earned_points'] / $item->available_points) * 100,
                                                        2,
                                                    ) . '%';
                                            }
                                        @endphp
                                        <tr class="table-item-row border-bottom"
                                            data-item-type="{{ $isEssential ? 'essential' : 'optional' }}"
                                            data-item-id="{{ $item->id }}">
                                            <td style="padding: 0.5rem;">
                                                <span class="fw-semibold"
                                                    style="font-size: 0.8rem;">{{ $loop->iteration }}</span>
                                            </td>
                                            <td style="padding: 0.5rem;">
                                                <span class="fw-semibold"
                                                    style="font-size: 0.8rem;">{{ $assessmentGroup->name }} -
                                                    {{ $item->name }}</span>
                                            </td>
                                            <td style="padding: 0.5rem;">
                                                <span style="font-size: 0.8rem;">{{ $item->description }}</span>
                                            </td>
                                            <td style="padding: 0.5rem;">
                                                <span class="fw-semibold {{ $classificationClass }}"
                                                    style="font-size: 0.8rem;">{{ $item->classification }}</span>
                                            </td>
                                            <td style="padding: 0.5rem;">
                                                <span class="{{ $classificationClass }}" style="font-size: 0.8rem;">
                                                    @if ($isEssential)
                                                        Essential (E) - (NO Points)
                                                    @else
                                                        Optional (Available Points)
                                                    @endif
                                                </span>
                                            </td>
                                            <td class="text-center" style="padding: 0.5rem;">
                                                <span class="fw-semibold {{ $classificationClass }}"
                                                    style="font-size: 0.8rem;">
                                                    @if ($isEssential)
                                                        E
                                                    @else
                                                        {{ $item->available_points }}
                                                    @endif
                                                </span>
                                            </td>
                                            <td class="text-center" style="padding: 0.5rem;">
                                                <div
                                                    class="form-check form-switch d-flex justify-content-center align-items-center">
                                                    <input class="form-check-input" type="checkbox" role="switch"
                                                        id="{{ $toggleId }}"
                                                        name="earned_points[{{ $item->id }}]" value="1"
                                                        {{ $currentToggleValue === 1 ? 'checked' : '' }}
                                                        data-item-id="{{ $item->id }}"
                                                        data-is-essential="{{ $isEssential ? '1' : '0' }}"
                                                        data-available-points="{{ $item->available_points }}"
                                                        onchange="handleToggleChange({{ $item->id }}, {{ $isEssential ? 'true' : 'false' }}, {{ $item->available_points }})"
                                                        style="cursor: pointer;">
                                                    @if (!$currentToggleValue)
                                                        <input type="hidden" name="earned_points[{{ $item->id }}]"
                                                            value="0">
                                                    @endif
                                                </div>
                                            </td>
                                            <td class="text-center" style="padding: 0.5rem;">
                                                <span id="{{ $percentageId }}"
                                                    class="percentage-display {{ $classificationClass }}"
                                                    style="font-size: 0.8rem;">
                                                    {{ $currentPercentage }}
                                                </span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex justify-content-end gap-2 p-3">
                            <button type="submit" id="submit-btn"
                                class="btn btn-primary btn-sm rounded-pill d-flex align-items-center px-4 py-2 shadow-sm border-0"
                                style="font-size: 1rem; font-weight: 600; letter-spacing: 0.5px; transition: background 0.2s, box-shadow 0.2s;">
                                <i class="bi bi-save me-2" style="font-size: 1.15rem;"></i>
                                <span>Save Earned Points</span>
                            </button>
                        </div>
                    </form>
                @else
                    <div class="text-center py-3">
                        <i class="bi bi-clipboard-x text-muted opacity-50 mb-2" style="font-size: 2.5rem;"></i>
                        <h5 class="fw-semibold mb-1" style="font-size: 1rem;">No Items Available</h5>
                        <p class="text-muted mb-2" style="font-size: 0.85rem;">Please add items
                            for this assessment group.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Validation Modal -->
    <div class="modal fade" id="validationModal" tabindex="-1" aria-labelledby="validationModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content shadow rounded-3 border-0">
                <div class="modal-header bg-danger text-white border-0 rounded-top-3">
                    <h5 class="modal-title fw-semibold d-flex align-items-center" id="validationModalLabel">
                        <i class="bi bi-exclamation-triangle me-2"></i>
                        Validation Error
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <p class="mb-0">
                        <i class="bi bi-info-circle text-danger me-2"></i>
                        All essential items must be selected before saving. Please ensure all essential items are
                        checked.
                    </p>
                </div>
                <div class="modal-footer border-0 bg-light rounded-bottom-3">
                    <button type="button" class="btn btn-primary rounded-pill" data-bs-dismiss="modal">
                        <i class="bi bi-check-circle me-1"></i>OK
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <!-- JustGage Library -->
    <script src="https://cdn.jsdelivr.net/npm/raphael@2.3.0/raphael.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/justgage@1.6.1/justgage.min.js"></script>

    <script>
        // Initialize gauges
        document.addEventListener('DOMContentLoaded', function() {
            // Mega Building Gauge
            const megaBuildingGauge = new JustGage({
                id: "gauge-mega-building",
                value: {{ $megaBuildingPercentage }},
                min: 0,
                max: 100,
                title: "Mega Building",
                label: "%",
                gaugeWidthScale: 0.6,
                pointer: true,
                counter: true,
                decimals: 2,
                customSectors: [{
                    color: "#ff0000",
                    lo: 0,
                    hi: 33
                }, {
                    color: "#ffa500",
                    lo: 33,
                    hi: 66
                }, {
                    color: "#4caf50",
                    lo: 66,
                    hi: 100
                }],
                textRenderer: function(value) {
                    return value.toFixed(2) + "%";
                }
            });

            // Sustainable Gauge
            const sustainableGauge = new JustGage({
                id: "gauge-sustainable",
                value: {{ $sustainablePercentage }},
                min: 0,
                max: 100,
                title: "Sustainable",
                label: "%",
                gaugeWidthScale: 0.6,
                pointer: true,
                counter: true,
                decimals: 2,
                gaugeColor: "#ffffff",
                levelColors: ["#1976d2"],
                customSectors: [{
                    color: "#ff0000",
                    lo: 0,
                    hi: 33
                }, {
                    color: "#ffa500",
                    lo: 33,
                    hi: 66
                }, {
                    color: "#1976d2",
                    lo: 66,
                    hi: 100
                }],
                textRenderer: function(value) {
                    return value.toFixed(2) + "%";
                }
            });

            // Intelligent Gauge
            const intelligentGauge = new JustGage({
                id: "gauge-intelligent",
                value: {{ $intelligentPercentage }},
                min: 0,
                max: 100,
                title: "Intelligent",
                label: "%",
                gaugeWidthScale: 0.6,
                pointer: true,
                counter: true,
                decimals: 2,
                gaugeColor: "#ffffff",
                levelColors: ["#ff9800"],
                customSectors: [{
                    color: "#ff0000",
                    lo: 0,
                    hi: 33
                }, {
                    color: "#ffa500",
                    lo: 33,
                    hi: 66
                }, {
                    color: "#ff9800",
                    lo: 66,
                    hi: 100
                }],
                textRenderer: function(value) {
                    return value.toFixed(2) + "%";
                }
            });

            // Healthy Gauge
            const healthyGauge = new JustGage({
                id: "gauge-healthy",
                value: {{ $healthyPercentage }},
                min: 0,
                max: 100,
                title: "Healthy",
                label: "%",
                gaugeWidthScale: 0.6,
                pointer: true,
                counter: true,
                decimals: 2,
                gaugeColor: "#ffffff",
                levelColors: ["#4caf50"],
                customSectors: [{
                    color: "#ff0000",
                    lo: 0,
                    hi: 33
                }, {
                    color: "#ffa500",
                    lo: 33,
                    hi: 66
                }, {
                    color: "#4caf50",
                    lo: 66,
                    hi: 100
                }],
                textRenderer: function(value) {
                    return value.toFixed(2) + "%";
                }
            });
        });

        function handleToggleChange(itemId, isEssential, availablePoints) {
            const toggle = document.getElementById('toggle-' + itemId);
            const percentageDisplay = document.getElementById('percentage-' + itemId);
            const hiddenInput = toggle.closest('td').querySelector('input[type="hidden"]');

            if (!toggle || !percentageDisplay) {
                return;
            }

            const isChecked = toggle.checked;

            // Update hidden input
            if (hiddenInput) {
                if (isChecked) {
                    hiddenInput.remove();
                }
            } else if (!isChecked) {
                const newHiddenInput = document.createElement('input');
                newHiddenInput.type = 'hidden';
                newHiddenInput.name = `earned_points[${itemId}]`;
                newHiddenInput.value = '0';
                toggle.closest('td').appendChild(newHiddenInput);
            }

            // Update percentage display
            if (isChecked) {
                percentageDisplay.textContent = '100.00%';
            } else {
                percentageDisplay.textContent = isEssential ? '0%' : '-';
            }
        }

        function validateEssentialItems() {
            const essentialToggles = document.querySelectorAll(
                'tr[data-item-type="essential"] input[type="checkbox"]');
            let allChecked = true;

            essentialToggles.forEach(function(toggle) {
                if (!toggle.checked) {
                    allChecked = false;
                }
            });

            return allChecked;
        }

        // Validate on form submit
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('earned-points-form');
            const validationModal = new bootstrap.Modal(document.getElementById('validationModal'));

            if (form) {
                form.addEventListener('submit', function(e) {
                    if (!validateEssentialItems()) {
                        e.preventDefault();
                        e.stopPropagation();
                        validationModal.show();
                        return false;
                    }
                });
            }
        });
    </script>
@endsection
