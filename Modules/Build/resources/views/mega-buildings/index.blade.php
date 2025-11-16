@extends('common::layouts.dashboard.master')

@section('css')

@endsection
@section('content')
    <div class="container-fluid py-4">
        <!-- Dashboard Header -->
        <div class="bg-gradient-primary text-white rounded-4 p-4 mb-5 shadow"
            style="background: linear-gradient(135deg, #1976d2 0%, #64b5f6 100%);">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center">
                <div>
                    <h1 class="h4 fw-semibold mb-1">
                        <i class="bi bi-building me-2"></i>
                        Building Assessment Dashboard
                    </h1>
                    <p class="mb-0 opacity-75 small">Manage your mega buildings, assessments, and scores in one place.</p>
                </div>
                <div class="mt-3 mt-md-0">
                    <a href="{{ route('index') }}"
                        class="btn btn-light btn-sm rounded-pill d-flex align-items-center"
                        style="font-size: 0.9rem; padding: 0.35rem 1.2rem;">
                        <i class="bi bi-house-door me-1"></i>
                        Home
                    </a>
                </div>
            </div>
        </div>

        <!-- Mega Buildings Section -->
        <div class="card shadow rounded-4 border-0 mb-4 py-3 px-2">
            <div class="card-header bg-transparent border-0 pb-0 d-flex justify-content-between align-items-center">
                <h2 class="h5 mb-0 fw-semibold d-flex align-items-center">
                    <i class="bi bi-building-check text-primary me-2"></i>
                    Mega Buildings (Project)
                </h2>
                <button type="button" class="btn btn-primary rounded-pill" data-bs-toggle="modal"
                    data-bs-target="#addMegaBuildingModal">
                    <i class="bi bi-plus-circle"></i>
                    <span>Add new Mega Building</span>
                </button>
            </div>
            <div class="card-body p-0 container my-4">
                @if ($megaBuildings->isNotEmpty())
                    <div class="table-responsive ">
                        <table class="table align-middle mb-0 table-borderless table-hover">
                           <thead class="table-light">
                                <tr>
                                    <th class="fw-semibold text-secondary">No.</th>
                                    <th class="fw-semibold text-secondary">Name</th>
                                    <th class="fw-semibold text-secondary d-none d-sm-block">Created</th>
                                    <th class="fw-semibold text-end text-secondary">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($megaBuildings as  $megaBuilding)
                                    <tr class="border-bottom">
                                        <td>
                                            <span class="fw-semibold">{{ $loop->iteration }}</span>
                                        </td>
                                        <td>
                                            <span class="fw-semibold">{{ $megaBuilding->name }}</span>
                                        </td>
                                        <td class="d-none d-sm-table-cell">
                                            <span class="text-muted small">
                                                <i class="bi bi-calendar me-1"></i>
                                                {{ $megaBuilding->created_at->diffForHumans() }}
                                            </span>
                                        </td>
                                        <td class="text-end">
                                            <a href="{{ route('building-types.index', ['mega_building' => $megaBuilding->id]) }}"
                                                class="btn btn-primary btn-sm rounded-pill px-4 d-inline-flex align-items-center gap-2">
                                                <i class="bi bi-play-circle"></i>
                                                Start Assessment
                                            </a>
                                        <form action="{{ route('mega-buildings.destroy', $megaBuilding->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger btn-sm rounded-pill px-3 d-inline-flex align-items-center gap-2"
                                                onclick="return confirm('Are you sure you want to delete this Mega Building?');" title="Delete">
                                                <i class="bi bi-trash"></i>
                                                Delete
                                            </button>
                                        </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="text-center py-5">
                        <i class="bi bi-building-x display-3 text-muted opacity-50 mb-3"></i>
                        <h4 class="fw-semibold mb-2">No Mega Buildings Yet</h4>
                        <p class="text-muted mb-3">Get started by creating your first mega building project!</p>
                        <button type="button"
                            class="btn btn-primary btn-lg rounded-pill d-inline-flex align-items-center gap-2"
                            data-bs-toggle="modal" data-bs-target="#addMegaBuildingModal">
                            <i class="bi bi-plus-circle"></i>
                            <span>Create Your First Mega Building</span>
                        </button>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Add Mega Building Modal -->
    <div class="modal fade" id="addMegaBuildingModal" tabindex="-1" aria-labelledby="addMegaBuildingModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content shadow rounded-3 border-0">
                <div class="modal-header bg-primary text-white border-0 rounded-top-3">
                    <h5 class="modal-title fw-semibold d-flex align-items-center" id="addMegaBuildingModalLabel">
                        <i class="bi bi-building-add me-2"></i>
                        Add New Mega Building
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <form id="storeForm" action="{{ route('mega-buildings.store') }}" method="POST">
                    @csrf
                    <div class="modal-body p-4">
                        <div class="mb-3">
                            <label for="mega_building_name" class="form-label fw-normal">Mega Building Name</label>
                            <input type="text" class="form-control form-control rounded-pill" id="mega_building_name"
                                name="name" placeholder="Enter mega building name" required autofocus>
                        </div>
                    </div>
                    <div class="modal-footer border-0 bg-light rounded-bottom-3">
                        <button type="button" class="btn btn-outline-secondary rounded-pill" data-bs-dismiss="modal">
                            <i class="bi bi-x-circle me-1"></i>Cancel
                        </button>
                        <button id="submit-btn" onclick="updateButton()" type="submit"
                            class="btn btn-primary rounded-pill">
                            <i class="bi bi-check-circle me-1"></i>Create Mega Building
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        // Slight tweak for modern feel: disables submit, animates button
        function updateButton() {
            const btn = document.getElementById('submit-btn');
            const form = document.getElementById('storeForm');
            btn.disabled = true;
            btn.innerHTML = `<span class="spinner-border spinner-border-sm me-2" role="status"></span>Saving...`;

            form.submit();
        }
    </script>
@endsection
