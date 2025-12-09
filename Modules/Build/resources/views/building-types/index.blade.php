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
                        <i class="bi bi-building me-1" style="font-size: 0.9rem;"></i>
                        Select Building Type
                    </h1>
                    <p class="mb-0 opacity-75" style="font-size: 0.75rem;">Choose a building type to continue.</p>
                </div>
                <div class="mt-2 mt-md-0 d-flex gap-2">
                    <a href="{{ route('index') }}" class="btn btn-light btn-sm rounded-pill d-flex align-items-center"
                        style="font-size: 0.8rem; padding: 0.25rem 0.75rem;">
                        <i class="bi bi-house-door me-1"></i>
                        Home
                    </a>
                    <a href="{{ route('mega-buildings.index') }}"
                        class="btn btn-light btn-sm rounded-pill d-flex align-items-center"
                        style="font-size: 0.8rem; padding: 0.25rem 0.75rem;">
                        <i class="bi bi-arrow-left me-1"></i>
                        Back to Mega Buildings
                    </a>
                </div>
            </div>
        </div>
        <!-- Context Information Bar -->
        <div class="mb-2">
            <div
                class="d-flex flex-column flex-md-row align-items-md-center gap-2 p-2 bg-white rounded-2 shadow-sm border border-light">
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
                <div class="d-flex flex-wrap gap-2 justify-content-center">
                    <!-- Mega Building Gauge -->
                    <div class="text-center p-2 bg-light rounded-3" style="min-width: 150px; max-width: 200px;">
                        <h6 class="fw-semibold mb-2" style="font-size: 0.7rem; color: #6c757d;">Mega Building</h6>
                        <div id="gauge-mega-building" style="width: 100%; height: 120px;"></div>
                        <div class="mt-1" style="font-size: 0.65rem; color: #6c757d;">
                            EP: {{ $megaBuildingEP }} / AP: {{ $megaBuildingAP }}
                        </div>
                    </div>

                    <!-- Individual Building Type Gauges -->
                    @foreach ($buildingTypes as $buildingType)
                        @php
                            $gaugeData = $buildingTypeGaugeData[$buildingType->id] ?? [
                                'percentage' => 0,
                                'ep' => 0,
                                'ap' => 0,
                            ];
                        @endphp
                        <div class="text-center p-2 bg-light rounded-3" style="min-width: 150px; max-width: 200px;">
                            <h6 class="fw-semibold mb-2" style="font-size: 0.7rem; color: #6c757d;">
                                {{ $buildingType->name }}
                            </h6>
                            <div id="gauge-building-type-{{ $buildingType->id }}" style="width: 100%; height: 120px;"></div>
                            <div class="mt-1" style="font-size: 0.65rem; color: #6c757d;">
                                EP: {{ $gaugeData['ep'] }} / AP: {{ $gaugeData['ap'] }}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Building Types Section -->
        <div class="card shadow rounded-3 border-0 mb-2 py-2 px-2">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show my-2" role="alert">
                    <i class="bi bi-check-circle me-2"></i>
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="card-header bg-transparent border-0 pb-0">
                <h2 class="h6 mb-0 fw-semibold d-flex align-items-center">
                    <i class="bi bi-list-check text-primary me-1" style="font-size: 0.9rem;"></i>
                    Available Building Types
                </h2>
            </div>
            <div class="card-body p-0 container my-2">
                @if ($buildingTypes->isNotEmpty())
                    <div class="table-responsive">
                        <table class="table align-middle mb-0 table-borderless table-hover" style="font-size: 0.875rem;">
                            <thead class="table-light">
                                <tr>
                                    <th class="fw-semibold text-secondary" style="font-size: 0.8rem;">No.</th>
                                    <th class="fw-semibold text-secondary" style="font-size: 0.8rem;">Building Type</th>
                                    <th class="fw-semibold text-secondary" style="font-size: 0.8rem;">Percentages</th>
                                    <th class="fw-semibold text-end text-secondary" style="font-size: 0.8rem;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($buildingTypes as $buildingType)
                                    @php
                                        $percentages = $buildingTypePercentages[$buildingType->id] ?? [];
                                    @endphp
                                    <tr class="border-bottom"
                                        onclick="window.location.href='{{ route('assessment-groups.index', ['mega_building' => $megaBuilding->id, 'building_type' => $buildingType->id]) }}'"
                                        style="cursor: pointer;" onmouseover="this.style.backgroundColor='#f8f9fa'"
                                        onmouseout="this.style.backgroundColor='transparent'">
                                        <td>
                                            <span class="fw-semibold"
                                                style="font-size: 0.85rem;">{{ $loop->iteration }}</span>
                                        </td>
                                        <td>
                                            <span class="fw-semibold"
                                                style="font-size: 0.85rem;">{{ $buildingType->name }}</span>
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
                        <i class="bi bi-building-x text-muted opacity-50 mb-2" style="font-size: 2.5rem;"></i>
                        <h5 class="fw-semibold mb-1" style="font-size: 1rem;">No Building Types Available</h5>
                        <p class="text-muted mb-2" style="font-size: 0.85rem;">Please contact administrator to add
                            building
                            types.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const alertSuccess = document.querySelector('.alert-success');
            if (alertSuccess) {
                setTimeout(() => {
                    alertSuccess.classList.add('fade');
                    setTimeout(() => {
                        alertSuccess.remove();
                    }, 500);
                }, 3000);
            }

            // Initialize Mega Building Gauge
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
                gaugeColor: "#fff4f0",
                levelColors: ["#ffe0d6"],
                textRenderer: function(value) {
                    return value.toFixed(2) + "%";
                }
            });

            // Color schemes for building types
            const colorSchemes = [{
                    gaugeColor: "#f3f7fc",
                    levelColor: "#e3f2fd",
                    gradient: [
                        ['0%', '#90caf9'],
                        ['50%', '#64b5f6'],
                        ['100%', '#1565c0']
                    ],
                    bgColors: ['#ffffff', '#f3f7fc']
                },
                {
                    gaugeColor: "#f5f8f4",
                    levelColor: "#e5f7e5",
                    gradient: [
                        ['0%', '#81c784'],
                        ['50%', '#66bb6a'],
                        ['100%', '#1b5e20']
                    ],
                    bgColors: ['#ffffff', '#f5f8f4']
                },
                {
                    gaugeColor: "#fff8f0",
                    levelColor: "#ffe0b2",
                    gradient: [
                        ['0%', '#ffb74d'],
                        ['50%', '#ff9800'],
                        ['100%', '#e65100']
                    ],
                    bgColors: ['#ffffff', '#fff8f0']
                },
                {
                    gaugeColor: "#f5f0ff",
                    levelColor: "#e0d7ff",
                    gradient: [
                        ['0%', '#d1c4e9'],
                        ['50%', '#b39ddb'],
                        ['100%', '#673ab7']
                    ],
                    bgColors: ['#ffffff', '#f5f0ff']
                },
                {
                    gaugeColor: "#f0f9ff",
                    levelColor: "#cfe2f3",
                    gradient: [
                        ['0%', '#4fc3f7'],
                        ['50%', '#29b6f6'],
                        ['100%', '#0277bd']
                    ],
                    bgColors: ['#ffffff', '#f0f9ff']
                },
                {
                    gaugeColor: "#fff0f5",
                    levelColor: "#fce4ec",
                    gradient: [
                        ['0%', '#f48fb1'],
                        ['50%', '#ec407a'],
                        ['100%', '#c2185b']
                    ],
                    bgColors: ['#ffffff', '#fff0f5']
                },
                {
                    gaugeColor: "#f3e5f5",
                    levelColor: "#e1bee7",
                    gradient: [
                        ['0%', '#ba68c8'],
                        ['50%', '#ab47bc'],
                        ['100%', '#6a1b9a']
                    ],
                    bgColors: ['#ffffff', '#f3e5f5']
                },
                {
                    gaugeColor: "#fff9e6",
                    levelColor: "#fff9c4",
                    gradient: [
                        ['0%', '#ffd54f'],
                        ['50%', '#ffc107'],
                        ['100%', '#f57f17']
                    ],
                    bgColors: ['#ffffff', '#fff9e6']
                }
            ];

            // Initialize Individual Building Type Gauges
            @foreach ($buildingTypes as $index => $buildingType)
                @php
                    $gaugeData = $buildingTypeGaugeData[$buildingType->id] ?? [
                        'percentage' => 0,
                        'ep' => 0,
                        'ap' => 0,
                    ];
                    $colorIndex = $index % 8;
                @endphp
                const buildingTypeGauge{{ $buildingType->id }} = new JustGage({
                    id: "gauge-building-type-{{ $buildingType->id }}",
                    value: {{ $gaugeData['percentage'] }},
                    min: 0,
                    max: 100,
                    title: "",
                    label: "%",
                    gaugeWidthScale: 0.5,
                    pointer: true,
                    counter: true,
                    decimals: 2,
                    gaugeColor: colorSchemes[{{ $colorIndex }}].gaugeColor,
                    levelColors: [colorSchemes[{{ $colorIndex }}].levelColor],
                    textRenderer: function(value) {
                        return value.toFixed(2) + "%";
                    }
                });
            @endforeach

            // Apply gradient function
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

            // Apply gradient to Mega Building gauge
            applyGradient('gauge-mega-building', 'megaBuildingGradient', [
                ['0%', '#FFB380'],
                ['50%', '#FF7043'],
                ['100%', '#D84315']
            ], ['#ffffff', '#fff4f0']);

            // Apply gradients to Building Type gauges
            @foreach ($buildingTypes as $index => $buildingType)
                @php
                    $colorIndex = $index % 8;
                @endphp
                applyGradient('gauge-building-type-{{ $buildingType->id }}',
                    'buildingTypeGradient{{ $buildingType->id }}',
                    colorSchemes[{{ $colorIndex }}].gradient,
                    colorSchemes[{{ $colorIndex }}].bgColors);
            @endforeach
        });
    </script>
@endsection
