@extends('common::layouts.dashboard.master')


@section('content')
    <div class="container-fluid py-4">
        <!-- Dashboard Header -->
        <div class="bg-gradient-primary text-white rounded-4 p-4 mb-5 shadow"
            style="background: linear-gradient(135deg, #1976d2 0%, #64b5f6 100%);">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center">
                <div>
                    <h1 class="h4 fw-semibold mb-1">
                        <i class="bi bi-building me-2"></i>
                        Building Report Dashboard
                    </h1>
                    <p class="mb-0 opacity-75 small">
                        Mega Building Report for <span class="fw-semibold">{{ $megaBuilding->name }}</span>
                    </p>
                </div>
                <div class="mt-3 mt-md-0 d-flex justify-content-center align-content-center gap-2">
                    <a href="{{ route('index') }}" class="btn btn-light btn-sm rounded-pill d-flex align-items-center"
                        style="font-size: 0.9rem; padding: 0.35rem 1.2rem;">
                        <i class="bi bi-house-door me-1"></i>
                        Home
                    </a>
                    <a href="{{ route('mega-buildings.index') }}" class="btn btn-light btn-sm rounded-pill d-flex align-items-center"
                        style="font-size: 0.9rem; padding: 0.35rem 1.2rem;">
                        <i class="bi bi-building me-1"></i>
                        Mega Buildings
                    </a>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="mb-0">Assessment Report - {{ $megaBuilding->name }}</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <!-- Left Column: Mega Building and Building Types List -->
                            <div class="col-md-3">
                                <!-- Mega Building Section -->
                                <div class="mb-4 p-3 border rounded" style="background-color: #e3f2fd;">
                                    <h5 class="fw-bold mb-3">MEGA BUILDING</h5>

                                    @foreach (['Sustainable', 'Healthy', 'Intelligent'] as $classification)
                                        <div class="mb-3">
                                            <h6 class="fw-bold">{{ strtoupper($classification) }}</h6>
                                            <div class="ms-3">
                                                <div>Essential Items = ({{ $megaBuildingData[$classification]['ap'] }})
                                                </div>
                                                <div>Earned Points = ({{ $megaBuildingData[$classification]['ep'] }}) of
                                                    ({{ $megaBuildingData[$classification]['total'] }})
                                                </div>
                                                <div>Earned Points =
                                                    ({{ $megaBuildingData[$classification]['percentage'] }})% of (100)%
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                                <!-- Building Types List -->
                                <div class="mt-4">
                                    <h6 class="fw-bold mb-3">CONTAINING AND CONNECTING:</h6>
                                    <ol class="ps-3">
                                        @foreach ($buildingTypes as $buildingType)
                                            <li class="mb-2">{{ $buildingType->name }}</li>
                                        @endforeach
                                    </ol>
                                </div>
                            </div>

                            <!-- Right Column: Building Type Assessments Grid -->
                            <div class="col-md-9">
                                <div class="row g-3">
                                    @foreach ($buildingTypes as $buildingType)
                                        <div class="col-md-6 col-lg-4">
                                            <div class="p-3 border rounded h-100" style="background-color: #f5f5f5;">
                                                <h6 class="fw-bold mb-3 text-center">{{ strtoupper($buildingType->name) }}
                                                </h6>

                                                @php
                                                    $data = $buildingTypesData[$buildingType->id] ?? [];
                                                @endphp

                                                @foreach (['Sustainable', 'Healthy', 'Intelligent'] as $classification)
                                                    <div class="mb-3">
                                                        <h6 class="fw-bold small">{{ strtoupper($classification) }}</h6>
                                                        <div class="ms-2 small">
                                                            <div>Essential Items =
                                                                ({{ $data[$classification]['ap'] ?? 0 }})
                                                            </div>
                                                            <div>Earned Points = ({{ $data[$classification]['ep'] ?? 0 }})
                                                                of ({{ $data[$classification]['total'] ?? 0 }})</div>
                                                            <div>Earned Points =
                                                                ({{ $data[$classification]['percentage'] ?? 0 }})
                                                                % of
                                                                (100)%</div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
