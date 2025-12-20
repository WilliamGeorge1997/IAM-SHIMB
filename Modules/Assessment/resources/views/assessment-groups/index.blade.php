@extends('common::layouts.dashboard.master')

@section('css')
    <style>
        .percentage-badge {
            font-weight: 600;
            font-size: 0.75rem;
            padding: 0.2rem 0.5rem;
            border-radius: 0.375rem;
            display: inline-block;
            margin: 0.1rem;
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
                        <i class="bi bi-clipboard-check me-1" style="font-size: 0.9rem;"></i>
                        Select Assessment Group
                    </h1>
                    <p class="mb-0 opacity-75" style="font-size: 0.75rem;">Choose an assessment group to continue.</p>
                </div>
                <div class="mt-2 mt-md-0 d-flex gap-2">
                    <a href="{{ route('index') }}" class="btn btn-light btn-sm rounded-pill d-flex align-items-center"
                        style="font-size: 0.8rem; padding: 0.25rem 0.75rem;">
                        <i class="bi bi-house-door me-1"></i>
                        Home
                    </a>
                    <a href="{{ route('building-types.index', $megaBuilding) }}"
                        class="btn btn-light btn-sm rounded-pill d-flex align-items-center"
                        style="font-size: 0.8rem; padding: 0.25rem 0.75rem;">
                        <i class="bi bi-arrow-left me-1"></i>
                        Back to Building Types
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
                </div>
            </div>
        </div>

        <!-- Gauges Section -->
        <div class="card shadow rounded-3 border-0 mb-2 py-2 px-2">
            <div class="card-header bg-transparent border-0 pb-0">
                <h2 class="h6 mb-0 fw-semibold d-flex align-items-center">
                    <i class="bi bi-speedometer2 text-primary me-1" style="font-size: 0.9rem;"></i>
                    Performance Overview
                </h2>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <!-- LEFT GROUP: Mega Building Overall Metrics -->
                    <div class="col-12 col-lg-6">
                        <div class="border rounded-3 p-3 h-100" style="border-color: #d1c4e9 !important;">
                            <div class="d-flex flex-wrap gap-2 justify-content-center">
                                <!-- Mega Building Gauge -->
                                <div class="flex-fill text-center p-2 bg-light rounded-3" style="min-width: 130px; max-width: 160px;">
                                    <h6 class="fw-semibold mb-2" style="font-size: 0.7rem; color: #673ab7;">Mega Building</h6>
                                    <div id="gauge-mega-building" style="width: 100%; height: 110px;"></div>
                                    <div class="mt-1" style="font-size: 0.6rem; color: #6c757d;">
                                        EP: {{ $megaBuildingEP }} / AP: {{ $megaBuildingAP }}
                                    </div>
                                </div>

                                <!-- Mega Building Sustainable Gauge -->
                                <div class="flex-fill text-center p-2 bg-light rounded-3" style="min-width: 130px; max-width: 160px;">
                                    <h6 class="fw-semibold mb-2 classification-sustainable" style="font-size: 0.7rem;">Sustainable</h6>
                                    <div id="gauge-mega-sustainable" style="width: 100%; height: 110px;"></div>
                                    <div class="mt-1" style="font-size: 0.6rem; color: #6c757d;">
                                        EP: {{ $megaSustainableEP }} / AP: {{ $megaSustainableAP }}
                                    </div>
                                </div>

                                <!-- Mega Building Healthy Gauge -->
                                <div class="flex-fill text-center p-2 bg-light rounded-3" style="min-width: 130px; max-width: 160px;">
                                    <h6 class="fw-semibold mb-2 classification-healthy" style="font-size: 0.7rem;">Healthy</h6>
                                    <div id="gauge-mega-healthy" style="width: 100%; height: 110px;"></div>
                                    <div class="mt-1" style="font-size: 0.6rem; color: #6c757d;">
                                        EP: {{ $megaHealthyEP }} / AP: {{ $megaHealthyAP }}
                                    </div>
                                </div>

                                <!-- Mega Building Intelligent Gauge -->
                                <div class="flex-fill text-center p-2 bg-light rounded-3" style="min-width: 130px; max-width: 160px;">
                                    <h6 class="fw-semibold mb-2 classification-intelligent" style="font-size: 0.7rem;">Intelligent</h6>
                                    <div id="gauge-mega-intelligent" style="width: 100%; height: 110px;"></div>
                                    <div class="mt-1" style="font-size: 0.6rem; color: #6c757d;">
                                        EP: {{ $megaIntelligentEP }} / AP: {{ $megaIntelligentAP }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- RIGHT GROUP: Building Type Specific Metrics -->
                    <div class="col-12 col-lg-6">
                        <div class="border rounded-3 p-3 h-100" style="border-color: #d1c4e9 !important;">
                            <div class="d-flex flex-wrap gap-2 justify-content-center">
                                <!-- Building Type Overall Gauge -->
                                <div class="flex-fill text-center p-2 bg-light rounded-3" style="min-width: 130px; max-width: 160px;">
                                    <h6 class="fw-semibold mb-2" style="font-size: 0.7rem; color: #673ab7;">{{ $buildingType->name }}</h6>
                                    <div id="gauge-building-type" style="width: 100%; height: 110px;"></div>
                                    <div class="mt-1" style="font-size: 0.6rem; color: #6c757d;">
                                        EP: {{ $buildingTypeEP }} / AP: {{ $buildingTypeAP }}
                                    </div>
                                </div>

                                <!-- Building Type Sustainable Gauge -->
                                <div class="flex-fill text-center p-2 bg-light rounded-3" style="min-width: 130px; max-width: 160px;">
                                    <h6 class="fw-semibold mb-2 classification-sustainable" style="font-size: 0.7rem;">Sustainable</h6>
                                    <div id="gauge-sustainable" style="width: 100%; height: 110px;"></div>
                                    <div class="mt-1" style="font-size: 0.6rem; color: #6c757d;">
                                        EP: {{ $sustainableEP }} / AP: {{ $sustainableAP }}
                                    </div>
                                </div>

                                <!-- Building Type Healthy Gauge -->
                                <div class="flex-fill text-center p-2 bg-light rounded-3" style="min-width: 130px; max-width: 160px;">
                                    <h6 class="fw-semibold mb-2 classification-healthy" style="font-size: 0.7rem;">Healthy</h6>
                                    <div id="gauge-healthy" style="width: 100%; height: 110px;"></div>
                                    <div class="mt-1" style="font-size: 0.6rem; color: #6c757d;">
                                        EP: {{ $healthyEP }} / AP: {{ $healthyAP }}
                                    </div>
                                </div>

                                <!-- Building Type Intelligent Gauge -->
                                <div class="flex-fill text-center p-2 bg-light rounded-3" style="min-width: 130px; max-width: 160px;">
                                    <h6 class="fw-semibold mb-2 classification-intelligent" style="font-size: 0.7rem;">Intelligent</h6>
                                    <div id="gauge-intelligent" style="width: 100%; height: 110px;"></div>
                                    <div class="mt-1" style="font-size: 0.6rem; color: #6c757d;">
                                        EP: {{ $intelligentEP }} / AP: {{ $intelligentAP }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Assessment Groups Section -->
        <div class="card shadow rounded-3 border-0 mb-2 py-2 px-2">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show my-2" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="card-header bg-transparent border-0 pb-0">
                <h2 class="h6 mb-0 fw-semibold d-flex align-items-center">
                    <i class="bi bi-list-check text-primary me-1" style="font-size: 0.9rem;"></i>
                    Available Assessment Groups
                </h2>
            </div>
            <div class="card-body p-0 container my-2">
                @if ($assessmentGroups->isNotEmpty())
                    <div class="table-responsive">
                        <table class="table align-middle mb-0 table-borderless table-hover" style="font-size: 0.875rem;">
                            <thead class="table-light">
                                <tr>
                                    <th class="fw-semibold text-secondary" style="font-size: 0.8rem;">No.</th>
                                    <th class="fw-semibold text-secondary" style="font-size: 0.8rem;">Assessment Group
                                    </th>
                                    <th class="fw-semibold text-secondary" style="font-size: 0.8rem;">Percentages</th>
                                    <th class="fw-semibold text-end text-secondary" style="font-size: 0.8rem;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($assessmentGroups as $assessmentGroup)
                                    @php
                                        $percentages = $groupPercentages[$assessmentGroup->id] ?? [];
                                    @endphp
                                    <tr class="border-bottom"
                                        onclick="window.location.href='{{ route('items.index', ['assessment_group' => $assessmentGroup->id, 'building_type' => $buildingType->id, 'mega_building' => $megaBuilding->id]) }}'"
                                        style="cursor: pointer;" onmouseover="this.style.backgroundColor='#f8f9fa'"
                                        onmouseout="this.style.backgroundColor='transparent'">
                                        <td>
                                            <span class="fw-semibold"
                                                style="font-size: 0.85rem;">{{ $loop->iteration }}</span>
                                        </td>
                                        <td>
                                            <span class="fw-semibold"
                                                style="font-size: 0.85rem;">{{ $assessmentGroup->name }}</span>
                                        </td>
                                        <td>
                                            @if (!empty($percentages))
                                                <div class="d-flex flex-wrap gap-1 align-items-center">
                                                    @if (isset($percentages['Sustainable']))
                                                        <span class="percentage-badge classification-sustainable">
                                                            Sustainable: {{ $percentages['Sustainable'] }}%
                                                        </span>
                                                    @endif
                                                    @if (isset($percentages['Healthy']))
                                                        <span class="percentage-badge classification-healthy">
                                                            Healthy: {{ $percentages['Healthy'] }}%
                                                        </span>
                                                    @endif
                                                    @if (isset($percentages['Intelligent']))
                                                        <span class="percentage-badge classification-intelligent">
                                                            Intelligent: {{ $percentages['Intelligent'] }}%
                                                        </span>
                                                    @endif
                                                </div>
                                            @else
                                                <span class="text-muted" style="font-size: 0.8rem;">-</span>
                                            @endif
                                        </td>
                                        <td class="text-end">
                                            <span
                                                class="btn btn-primary btn-sm rounded-pill px-3 d-inline-flex align-items-center gap-1"
                                                style="font-size: 0.8rem; padding: 0.2rem 0.6rem;">
                                                <i class="bi bi-check-circle" style="font-size: 0.85rem;"></i>
                                                Select
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="text-center py-3">
                        <i class="bi bi-clipboard-x text-muted opacity-50 mb-2" style="font-size: 2.5rem;"></i>
                        <h5 class="fw-semibold mb-1" style="font-size: 1rem;">No Assessment Groups Available</h5>
                        <p class="text-muted mb-2" style="font-size: 0.85rem;">Please contact administrator to add
                            assessment groups.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const successAlert = document.querySelector('.alert-success');
            if (successAlert) {
                setTimeout(function() {
                    successAlert.classList.remove('show');
                    successAlert.classList.add('fade');
                    setTimeout(function() {
                        if (successAlert.parentNode) {
                            successAlert.parentNode.removeChild(successAlert);
                        }
                    }, 500);
                }, 3000);
            }

            // Initialize gauges (smaller size for overview)

            // ============ LEFT GROUP: MEGA BUILDING GAUGES ============

            // Mega Building Overall Gauge (Violet)
            const megaBuildingGauge = new JustGage({
                id: "gauge-mega-building",
                value: {{ $megaBuildingPercentage }},
                min: 0,
                max: 100,
                title: "",
                label: "%",
                gaugeWidthScale: 0.5,
                pointer: true,
                counter: true,
                decimals: 2,
                gaugeColor: "#f5f0ff",
                levelColors: ["#e0d7ff"],
                textRenderer: function(value) {
                    return value.toFixed(2) + "%";
                }
            });

            // Mega Building Sustainable Gauge
            const megaSustainableGauge = new JustGage({
                id: "gauge-mega-sustainable",
                value: {{ $megaSustainablePercentage }},
                min: 0,
                max: 100,
                title: "",
                label: "%",
                gaugeWidthScale: 0.5,
                pointer: true,
                counter: true,
                decimals: 2,
                gaugeColor: "#f3f7fc",
                levelColors: ["#e3f2fd"],
                textRenderer: function(value) {
                    return value.toFixed(2) + "%";
                }
            });

            // Mega Building Healthy Gauge
            const megaHealthyGauge = new JustGage({
                id: "gauge-mega-healthy",
                value: {{ $megaHealthyPercentage }},
                min: 0,
                max: 100,
                title: "",
                label: "%",
                gaugeWidthScale: 0.5,
                pointer: true,
                counter: true,
                decimals: 2,
                gaugeColor: "#f5f8f4",
                levelColors: ["#e5f7e5"],
                textRenderer: function(value) {
                    return value.toFixed(2) + "%";
                }
            });

            // Mega Building Intelligent Gauge
            const megaIntelligentGauge = new JustGage({
                id: "gauge-mega-intelligent",
                value: {{ $megaIntelligentPercentage }},
                min: 0,
                max: 100,
                title: "",
                label: "%",
                gaugeWidthScale: 0.5,
                pointer: true,
                counter: true,
                decimals: 2,
                gaugeColor: "#fff8f0",
                levelColors: ["#ffe0b2"],
                textRenderer: function(value) {
                    return value.toFixed(2) + "%";
                }
            });

            // ============ RIGHT GROUP: BUILDING TYPE GAUGES ============

            // Building Type Overall Gauge
            const buildingTypeGauge = new JustGage({
                id: "gauge-building-type",
                value: {{ $buildingTypeAveragePercentage }},
                min: 0,
                max: 100,
                title: "",
                label: "%",
                gaugeWidthScale: 0.5,
                pointer: true,
                counter: true,
                decimals: 2,
                gaugeColor: "#f5f0ff",
                levelColors: ["#e0d7ff"],
                textRenderer: function(value) {
                    return value.toFixed(2) + "%";
                }
            });

            // Building Type Sustainable Gauge
            const sustainableGauge = new JustGage({
                id: "gauge-sustainable",
                value: {{ $sustainablePercentage }},
                min: 0,
                max: 100,
                title: "",
                label: "%",
                gaugeWidthScale: 0.5,
                pointer: true,
                counter: true,
                decimals: 2,
                gaugeColor: "#f3f7fc",
                levelColors: ["#e3f2fd"],
                textRenderer: function(value) {
                    return value.toFixed(2) + "%";
                }
            });

            // Building Type Healthy Gauge
            const healthyGauge = new JustGage({
                id: "gauge-healthy",
                value: {{ $healthyPercentage }},
                min: 0,
                max: 100,
                title: "",
                label: "%",
                gaugeWidthScale: 0.5,
                pointer: true,
                counter: true,
                decimals: 2,
                gaugeColor: "#f5f8f4",
                levelColors: ["#e5f7e5"],
                textRenderer: function(value) {
                    return value.toFixed(2) + "%";
                }
            });

            // Building Type Intelligent Gauge
            const intelligentGauge = new JustGage({
                id: "gauge-intelligent",
                value: {{ $intelligentPercentage }},
                min: 0,
                max: 100,
                title: "",
                label: "%",
                gaugeWidthScale: 0.5,
                pointer: true,
                counter: true,
                decimals: 2,
                gaugeColor: "#fff8f0",
                levelColors: ["#ffe0b2"],
                textRenderer: function(value) {
                    return value.toFixed(2) + "%";
                }
            });

            // Apply gradients to gauges
            function applyGradient(gaugeId, gradientId, colors, bgColors) {
                setTimeout(function() {
                    const gaugeElement = document.getElementById(gaugeId);
                    if (!gaugeElement) {
                        return;
                    }

                    const svg = gaugeElement.querySelector('svg');
                    if (!svg) {
                        return;
                    }

                    const defs = svg.querySelector('defs') || svg.insertBefore(
                        document.createElementNS('http://www.w3.org/2000/svg', 'defs'),
                        svg.firstChild
                    );

                    defs.querySelector('#' + gradientId)?.remove();

                    const gradient = document.createElementNS('http://www.w3.org/2000/svg',
                        'linearGradient');
                    gradient.setAttribute('id', gradientId);
                    gradient.setAttribute('x1', '0%');
                    gradient.setAttribute('y1', '0%');
                    gradient.setAttribute('x2', '100%');
                    gradient.setAttribute('y2', '0%');

                    colors.forEach(function([offset, color]) {
                        const stop = document.createElementNS('http://www.w3.org/2000/svg', 'stop');
                        stop.setAttribute('offset', offset);
                        stop.setAttribute('stop-color', color);
                        stop.setAttribute('stop-opacity', '1');
                        gradient.appendChild(stop);
                    });

                    defs.appendChild(gradient);

                    svg.querySelectorAll('path').forEach(function(path) {
                        const fill = path.getAttribute('fill');
                        if (fill && bgColors.indexOf(fill) === -1 && fill !== 'none') {
                            path.setAttribute('fill', 'url(#' + gradientId + ')');
                        }
                    });
                }, 100);
            }

            // Apply gradients

            // ============ LEFT GROUP: MEGA BUILDING GRADIENTS ============

            // Mega Building - Violet gradient
            applyGradient('gauge-mega-building', 'megaBuildingGradient', [
                ['0%', '#d1c4e9'],
                ['50%', '#b39ddb'],
                ['100%', '#673ab7']
            ], ['#ffffff', '#f5f0ff']);

            // Mega Building Sustainable - Blue gradient
            applyGradient('gauge-mega-sustainable', 'megaSustainableGradient', [
                ['0%', '#90caf9'],
                ['50%', '#64b5f6'],
                ['100%', '#1565c0']
            ], ['#ffffff', '#f3f7fc']);

            // Mega Building Healthy - Green gradient
            applyGradient('gauge-mega-healthy', 'megaHealthyGradient', [
                ['0%', '#81c784'],
                ['50%', '#66bb6a'],
                ['100%', '#1b5e20']
            ], ['#ffffff', '#f5f8f4']);

            // Mega Building Intelligent - Orange gradient
            applyGradient('gauge-mega-intelligent', 'megaIntelligentGradient', [
                ['0%', '#ffb74d'],
                ['50%', '#ff9800'],
                ['100%', '#e65100']
            ], ['#ffffff', '#fff8f0']);

            // ============ RIGHT GROUP: BUILDING TYPE GRADIENTS ============

            // Building Type - Violet gradient
            applyGradient('gauge-building-type', 'buildingTypeGradient', [
                ['0%', '#d1c4e9'],
                ['50%', '#b39ddb'],
                ['100%', '#673ab7']
            ], ['#ffffff', '#f5f0ff']);

            // Building Type Sustainable - Blue gradient
            applyGradient('gauge-sustainable', 'sustainableGradient', [
                ['0%', '#90caf9'],
                ['50%', '#64b5f6'],
                ['100%', '#1565c0']
            ], ['#ffffff', '#f3f7fc']);

            // Building Type Healthy - Green gradient
            applyGradient('gauge-healthy', 'healthyGradient', [
                ['0%', '#81c784'],
                ['50%', '#66bb6a'],
                ['100%', '#1b5e20']
            ], ['#ffffff', '#f5f8f4']);

            // Building Type Intelligent - Orange gradient
            applyGradient('gauge-intelligent', 'intelligentGradient', [
                ['0%', '#ffb74d'],
                ['50%', '#ff9800'],
                ['100%', '#e65100']
            ], ['#ffffff', '#fff8f0']);
        });
    </script>
@endsection
