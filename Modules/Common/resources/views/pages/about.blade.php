@extends('common::layouts.master')

@section('css')
@endsection

@section('content')
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container hero-content">
            <div class="row align-items-center">
                <div class="col-12 col-lg-7">
                    <h1 class="hero-title">About IAM-SHIMB</h1>
                    <h3 class="hero-subtitle">Integrated Assessment Model for Sustainable, Healthy & Intelligent Mega
                        Buildings</h3>
                    <p class="hero-description">
                        IAM-SHIMB is a doctoral research program by Dr. Esraa Ayman Elgezery within AASTMT's College of
                        Engineering & Technology.
                        The platform captures holistic performance across social, environmental, and technological domains
                        to guide mega building developments.
                    </p>
                    <div class="hero-actions d-flex flex-wrap gap-3">
                        <a class="btn btn-custom btn-lg">
                            <span><i class="bi bi-play-circle me-2"></i>Launch Assessment</span>
                        </a>
                        <a href="{{ route('index') }}" class="btn btn-outline-light btn-lg">
                            <i class="bi bi-house-door me-2"></i>Back to Home
                        </a>
                    </div>
                </div>
                <div class="col-lg-5 text-center d-none d-lg-block">
                    <img src="{{ asset('assets/images/logo.webp') }}" alt="IAM-SHIMB" class="hero-logo"
                        style="max-width: 300px; opacity: 0.3;">
                </div>
            </div>
        </div>
    </section>

    <!-- Research Leadership Section -->
    <section class="section-spacing fade-in">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title">Research Leadership</h2>
                <p class="section-subtitle">Led by distinguished researchers and academic supervisors</p>
            </div>

            <div class="row g-4">
                <div class="col-md-6 col-lg-3">
                    <div class="card supervisor-card text-center h-100">
                        <div class="supervisor-icon">
                            <i class="bi bi-person-badge"></i>
                        </div>
                        <h5 class="mb-1 fw-bold">Dr. Esraa Ayman Elgezery</h5>
                        <p class="text-muted mb-0" style="font-size: 0.85rem;">PhD Researcher</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="card supervisor-card text-center h-100">
                        <div class="supervisor-icon">
                            <i class="bi bi-award"></i>
                        </div>
                        <h5 class="mb-1 fw-bold">Prof. Dr. Wael Kamel</h5>

                        <p class="text-muted mb-0" style="font-size: 0.8rem; margin-top: 0.25rem;">Construction & Building
                            Engineering Deptartment, AASTMT - Alexandria</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="card supervisor-card text-center h-100">
                        <div class="supervisor-icon">
                            <i class="bi bi-award"></i>
                        </div>
                        <h5 class="mb-1 fw-bold">Prof. Dr. Sherine Shafik Aly</h5>

                        <p class="text-muted mb-0" style="font-size: 0.8rem; margin-top: 0.25rem;">Architecture Engineering
                            & Environmental Design Deptartment, AASTMT - Alexandria</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="card supervisor-card text-center h-100">
                        <div class="supervisor-icon">
                            <i class="bi bi-award"></i>
                        </div>
                        <h5 class="mb-1 fw-bold">Prof. Dr. Tarek Farghaly</h5>

                        <p class="text-muted mb-0" style="font-size: 0.8rem; margin-top: 0.25rem;">Architecture Engineering
                            Deptartment, Faculty of Engineering, Alexandria University</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Vision Section -->
    <section class="section-spacing bg-light-custom fade-in">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title">Program Vision</h2>
                <p class="section-subtitle">Why IAM-SHIMB matters</p>
            </div>

            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card feature-card-v2 text-center">
                        <div class="feature-icon-v2">
                            <i class="bi bi-globe"></i>
                        </div>
                        <h4 class="mb-3 fw-bold">Holistic Sustainability</h4>
                        <p class="text-muted mb-0">
                            Integrates environmental stewardship, resilience, and resource efficiency benchmarks for mega
                            projects.
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card feature-card-v2 text-center">
                        <div class="feature-icon-v2">
                            <i class="bi bi-people"></i>
                        </div>
                        <h4 class="mb-3 fw-bold">Human-Centric Wellbeing</h4>
                        <p class="text-muted mb-0">
                            Prioritises comfort, health, accessibility, and community vibrancy through measurable
                            indicators.
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card feature-card-v2 text-center">
                        <div class="feature-icon-v2">
                            <i class="bi bi-cpu"></i>
                        </div>
                        <h4 class="mb-3 fw-bold">Intelligent Readiness</h4>
                        <p class="text-muted mb-0">
                            Evaluates digital infrastructure, smart services, and future-proof capabilities for adaptive
                            buildings.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Methodology Section -->
    <section class="section-spacing fade-in">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title">Methodology</h2>
                <p class="section-subtitle">Structured assessment groups and scoring logic</p>
            </div>

            <div class="row g-4">
                <div class="col-lg-6">
                    <div class="card info-card">
                        <div class="info-icon">
                            <i class="bi bi-list-ul"></i>
                        </div>
                        <h5 class="mb-3 fw-bold">Assessment Groups</h5>
                        <p class="text-muted mb-3">
                            The platform is divided into 17 themed assessment groups covering all aspects of building
                            performance:
                        </p>
                        <ul class="text-muted mb-0" style="list-style: none; padding-left: 0;">
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-primary me-2"></i>Site & Environment •
                                Air • Water • Energy</li>
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-primary me-2"></i>Mobility • Material
                                • Visual Quality • Acoustic Quality</li>
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-primary me-2"></i>Nourishment •
                                Fitness • Community • Innovation</li>
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-primary me-2"></i>Life-Safety •
                                Security • Services • AI-Full Autonomous Buildings</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card info-card">
                        <div class="info-icon">
                            <i class="bi bi-diagram-3"></i>
                        </div>
                        <h5 class="mb-3 fw-bold">Classification Criteria</h5>
                        <ul class="text-muted mb-0" style="list-style: none; padding-left: 0;">
                            <li class="mb-3">
                                <strong class="text-dark">Item Classification:</strong><br>
                                Each item is tagged as <strong>Sustainable</strong>, <strong>Healthy</strong>, or
                                <strong>Intelligent</strong>.
                            </li>
                            <li class="mb-3">
                                <strong class="text-dark">Essential Items:</strong><br>
                                Mandatory items (no points) that ensure baseline performance standards.
                            </li>
                            <li class="mb-3">
                                <strong class="text-dark">Optional Items:</strong><br>
                                Provide additional points to raise Available Points (AP) and Earned Points (EP) totals.
                            </li>
                            <li class="mb-0">
                                <strong class="text-dark">Automated Calculations:</strong><br>
                                Real-time summarization of progress within the dashboard.
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Assessment Groups Preview -->
    <section class="section-spacing bg-light-custom fade-in">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title">17 Assessment Groups</h2>
                <p class="section-subtitle">Comprehensive evaluation across all building aspects</p>
            </div>

            <div class="assessment-grid">
                <div class="assessment-card">
                    <div class="assessment-icon-wrapper text-success">
                        <i class="bi bi-tree"></i>
                    </div>
                    <div class="assessment-content">
                        <strong>Site & Environment</strong>
                    </div>
                </div>

                <div class="assessment-card">
                    <div class="assessment-icon-wrapper text-primary">
                        <i class="bi bi-wind"></i>
                    </div>
                    <div class="assessment-content">
                        <strong>Air Quality</strong>
                    </div>
                </div>

                <div class="assessment-card">
                    <div class="assessment-icon-wrapper text-info">
                        <i class="bi bi-droplet"></i>
                    </div>
                    <div class="assessment-content">
                        <strong>Water Management</strong>
                    </div>
                </div>

                <div class="assessment-card">
                    <div class="assessment-icon-wrapper text-warning">
                        <i class="bi bi-lightning-charge"></i>
                    </div>
                    <div class="assessment-content">
                        <strong>Energy Efficiency</strong>
                    </div>
                </div>

                <div class="assessment-card">
                    <div class="assessment-icon-wrapper text-secondary">
                        <i class="bi bi-car-front"></i>
                    </div>
                    <div class="assessment-content">
                        <strong>Mobility & Access</strong>
                    </div>
                </div>

                <div class="assessment-card">
                    <div class="assessment-icon-wrapper text-danger">
                        <i class="bi bi-bricks"></i>
                    </div>
                    <div class="assessment-content">
                        <strong>Material Selection</strong>
                    </div>
                </div>

                <div class="assessment-card">
                    <div class="assessment-icon-wrapper text-dark">
                        <i class="bi bi-eye"></i>
                    </div>
                    <div class="assessment-content">
                        <strong>Visual Quality</strong>
                    </div>
                </div>

                <div class="assessment-card">
                    <div class="assessment-icon-wrapper text-primary">
                        <i class="bi bi-soundwave"></i>
                    </div>
                    <div class="assessment-content">
                        <strong>Acoustic Quality</strong>
                    </div>
                </div>

                <div class="assessment-card">
                    <div class="assessment-icon-wrapper text-danger">
                        <i class="bi bi-heart"></i>
                    </div>
                    <div class="assessment-content">
                        <strong>Nourishment & Wellness</strong>
                    </div>
                </div>

                <div class="assessment-card">
                    <div class="assessment-icon-wrapper text-success">
                        <i class="bi bi-activity"></i>
                    </div>
                    <div class="assessment-content">
                        <strong>Fitness & Activity</strong>
                    </div>
                </div>

                <div class="assessment-card">
                    <div class="assessment-icon-wrapper text-info">
                        <i class="bi bi-brain"></i>
                    </div>
                    <div class="assessment-content">
                        <strong>Mind & Cognition</strong>
                    </div>
                </div>

                <div class="assessment-card">
                    <div class="assessment-icon-wrapper text-warning">
                        <i class="bi bi-people"></i>
                    </div>
                    <div class="assessment-content">
                        <strong>Community & Social</strong>
                    </div>
                </div>

                <div class="assessment-card">
                    <div class="assessment-icon-wrapper text-warning">
                        <i class="bi bi-lightbulb"></i>
                    </div>
                    <div class="assessment-content">
                        <strong>Innovation</strong>
                    </div>
                </div>

                <div class="assessment-card">
                    <div class="assessment-icon-wrapper text-success">
                        <i class="bi bi-shield-check"></i>
                    </div>
                    <div class="assessment-content">
                        <strong>Safety & Protection</strong>
                    </div>
                </div>

                <div class="assessment-card">
                    <div class="assessment-icon-wrapper text-danger">
                        <i class="bi bi-lock"></i>
                    </div>
                    <div class="assessment-content">
                        <strong>Security Systems</strong>
                    </div>
                </div>

                <div class="assessment-card">
                    <div class="assessment-icon-wrapper text-secondary">
                        <i class="bi bi-gear"></i>
                    </div>
                    <div class="assessment-content">
                        <strong>Services & Facilities</strong>
                    </div>
                </div>

                <div class="assessment-card">
                    <div class="assessment-icon-wrapper text-primary">
                        <i class="bi bi-robot"></i>
                    </div>
                    <div class="assessment-content">
                        <strong>AI-Full Autonomous Buildings</strong>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="section-spacing fade-in">
        <div class="container">
            <div class="cta-section text-center">
                <h2 class="section-title mb-4">Ready to Evaluate Your Project?</h2>
                <p class="lead mb-4">Launch IAM-SHIMB to follow the guided workflow, customise sensor data, and present
                    quantitative insights to stakeholders.</p>
                <a class="btn btn-light btn-lg" style="border-radius: 50px; padding: 14px 45px; font-weight: 600;">
                    <i class="bi bi-arrow-right-circle me-2"></i>Start Now
                </a>
            </div>
        </div>
    </section>
@endsection
