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
                        IAM-SHIMB’s web-based program is the end process of the thesis submitted to AASTMT in partial
                        fulfillment of the
                        requirements for the award of the degree of DOCTOR OF PHILOSOPHY in Architecture Engineering &
                        Environmental Design,
                        College of Engineering and Technology, AASTMT…
                    </p>
                    <div class="hero-actions d-flex flex-wrap gap-3">
                        <a href="{{ route('mega-buildings.index') }}" class="btn btn-custom btn-lg">
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

    {{-- By --}}
    <section class="section-spacing fade-in">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title">By</h2>
                <p class="section-subtitle">Research undertaken and presented by</p>
            </div>

            <div class="row g-4 justify-content-center">
                <div class="col-md-4">
                    <div class="card supervisor-card text-center h-100">
                        <div class="supervisor-icon">
                            <i class="bi bi-award"></i>
                        </div>
                        <h5 class="mb-1 fw-bold text-nowrap">Ph.D. Researcher: Esraa Ayman Elgezery</h5>

                        <p class="text-muted mb-0 " style="font-size: 0.8rem; margin-top: 0.25rem;">Department Of
                            Architecture Engineering & Environmental Design

                        </p>
                        <p class="text-muted mb-0" style="font-size: 0.8rem; margin-top: 0.25rem;">Arab Academy For
                            Science, Technology And Maritime Transport - Alexandria
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Supervisors Leadership Section -->
    <section class="section-spacing fade-in">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title">Supervisors</h2>
                <p class="section-subtitle">Supervised by distinguished supervisors</p>
            </div>

            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card supervisor-card text-center h-100">
                        <div class="supervisor-icon">
                            <i class="bi bi-award"></i>
                        </div>
                        <h5 class="mb-1 fw-bold">Prof. Dr. Wael Kamel</h5>

                        <p class="text-muted mb-0" style="font-size: 0.8rem; margin-top: 0.25rem;">Department of
                            Construction & Building Engineering
                        </p>
                        <p class="text-muted mb-0" style="font-size: 0.8rem; margin-top: 0.25rem;">Arab Academy for
                            Science, Technology and Maritime Transport - Alexandria</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card supervisor-card text-center h-100">
                        <div class="supervisor-icon">
                            <i class="bi bi-award"></i>
                        </div>
                        <h5 class="mb-1 fw-bold">Prof. Dr. Sherine Shafik Aly</h5>

                        <p class="text-muted mb-0" style="font-size: 0.8rem; margin-top: 0.25rem;">Department of
                            Architecture Engineering & Environmental Design
                        </p>
                        <p class="text-muted mb-0" style="font-size: 0.8rem; margin-top: 0.25rem;">Arab Academy for
                            Science, Technology and Maritime Transport - Alexandria</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card supervisor-card text-center h-100">
                        <div class="supervisor-icon">
                            <i class="bi bi-award"></i>
                        </div>
                        <h5 class="mb-1 fw-bold">Prof. Dr. Tarek Farghaly</h5>

                        <p class="text-muted mb-0" style="font-size: 0.8rem; margin-top: 0.25rem;">Department of
                            Architecture Engineering
                        </p>
                        <p class="text-muted mb-0" style="font-size: 0.8rem; margin-top: 0.25rem;">Faculty of Engineering,
                            Alexandria University</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-spacing fade-in">
        <div class="container">
            <div class="alert alert-primary d-flex justify-content-center align-items-center shadow-sm py-3 px-4 mb-0" role="note"
                style="background: linear-gradient(90deg, #1679AB 40%, #66c7f4 100%); color: #fff; border: none; border-radius: 1rem;">
                <span>
                    The platform captures holistic performance
                    across social
                    environmental
                    and
                    technological
                    domains to guide mega building developments.
                </span>
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

                <!-- Type of Building Card -->
                <div class="col-lg-4">
                    <div class="card info-card h-100">
                        <div class="info-icon">
                            <i class="bi bi-building"></i>
                        </div>
                        <h5 class="mb-3 fw-bold">Type of Building</h5>
                        <p class="text-muted mb-2">
                            The platform contains 10 buildings types covering all mega building types:
                        </p>
                        <div class="row row-cols-2 g-2 small">
                            <div class="col">1. Residential Building</div>
                            <div class="col">2. Educational Building</div>
                            <div class="col">3. Institutional Building</div>
                            <div class="col">4. Commercial Building</div>
                            <div class="col">5. Business Building</div>
                            <div class="col">6. Industrial Building</div>
                            <div class="col">7. Storage Building</div>
                            <div class="col">8. Hazardous Building</div>
                            <div class="col">9. Special Building (free style)</div>
                            <div class="col">10. Multi-Level Car Parking</div>
                        </div>
                    </div>
                </div>

                <!-- Assessment Groups Card -->
                <div class="col-lg-4">
                    <div class="card info-card h-100">
                        <div class="info-icon">
                            <i class="bi bi-list-ol"></i>
                        </div>
                        <h5 class="mb-3 fw-bold">Assessment Groups</h5>
                        <p class="text-muted mb-2">
                            The platform is divided into 17 themed assessment groups covering all aspects of building performance:
                        </p>
                        <div class="row row-cols-2 g-2 small mb-0">
                            <div class="col">1. Site &amp; Environment</div>
                            <div class="col">2. Air</div>
                            <div class="col">3. Water</div>
                            <div class="col">4. Energy</div>
                            <div class="col">5. Mobility</div>
                            <div class="col">6. Material</div>
                            <div class="col">7. Visual Quality</div>
                            <div class="col">8. Acoustic Quality</div>
                            <div class="col">9. Nourishment</div>
                            <div class="col">10. Fitness</div>
                            <div class="col">11. Mind</div>
                            <div class="col">12. Community</div>
                            <div class="col">13. Innovation</div>
                            <div class="col">14. Safety</div>
                            <div class="col">15. Security</div>
                            <div class="col">16. Services</div>
                            <div class="col">17. Full Autonomous Buildings</div>
                        </div>
                    </div>
                </div>

                <!-- Classification Criteria Card -->
                <div class="col-lg-4">
                    <div class="card info-card h-100">
                        <div class="info-icon">
                            <i class="bi bi-diagram-3"></i>
                        </div>
                        <h5 class="mb-3 fw-bold">Classification Criteria</h5>
                        <ul class="text-muted mb-0" style="list-style: none; padding-left: 0;">
                            <li class="mb-3">
                                • <strong>Item Classification:</strong><br>
                                Each item is tagged as Sustainable, Healthy, or Intelligent.
                            </li>
                            <li class="mb-3">
                                • <strong>Essential Items:</strong><br>
                                Mandatory items to be selected (with no earned points) that ensure baseline performance standards.
                            </li>
                            <li class="mb-3">
                                • <strong>Optional Items:</strong><br>
                                Provide Available Points (AP), when selected they raise the total Earned Points (EP).
                            </li>
                            <li class="mb-0">
                                • <strong>Automated Calculations:</strong><br>
                                Real-time summarization of progress within the dashboard
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
                        <strong>1. Site Environment</strong>
                    </div>
                </div>
                <div class="assessment-card">
                    <div class="assessment-icon-wrapper text-primary">
                        <i class="bi bi-wind"></i>
                    </div>
                    <div class="assessment-content">
                        <strong>2. Air</strong>
                    </div>
                </div>
                <div class="assessment-card">
                    <div class="assessment-icon-wrapper text-info">
                        <i class="bi bi-droplet"></i>
                    </div>
                    <div class="assessment-content">
                        <strong>3. Water</strong>
                    </div>
                </div>
                <div class="assessment-card">
                    <div class="assessment-icon-wrapper text-warning">
                        <i class="bi bi-lightning-charge"></i>
                    </div>
                    <div class="assessment-content">
                        <strong>4. Energy</strong>
                    </div>
                </div>
                <div class="assessment-card">
                    <div class="assessment-icon-wrapper text-secondary">
                        <i class="bi bi-car-front"></i>
                    </div>
                    <div class="assessment-content">
                        <strong>5. Mobility</strong>
                    </div>
                </div>
                <div class="assessment-card">
                    <div class="assessment-icon-wrapper text-danger">
                        <i class="bi bi-bricks"></i>
                    </div>
                    <div class="assessment-content">
                        <strong>6. Material</strong>
                    </div>
                </div>
                <div class="assessment-card">
                    <div class="assessment-icon-wrapper text-dark">
                        <i class="bi bi-eye"></i>
                    </div>
                    <div class="assessment-content">
                        <strong>7. Visual Quality</strong>
                    </div>
                </div>
                <div class="assessment-card">
                    <div class="assessment-icon-wrapper text-primary">
                        <i class="bi bi-soundwave"></i>
                    </div>
                    <div class="assessment-content">
                        <strong>8. Acoustic Quality</strong>
                    </div>
                </div>
                <div class="assessment-card">
                    <div class="assessment-icon-wrapper text-danger">
                        <i class="bi bi-heart"></i>
                    </div>
                    <div class="assessment-content">
                        <strong>9. Nourishment</strong>
                    </div>
                </div>
                <div class="assessment-card">
                    <div class="assessment-icon-wrapper text-success">
                        <i class="bi bi-activity"></i>
                    </div>
                    <div class="assessment-content">
                        <strong>10. Fitness</strong>
                    </div>
                </div>
                <div class="assessment-card">
                    <div class="assessment-icon-wrapper text-info">
                        <i class="bi bi-brain"></i>
                    </div>
                    <div class="assessment-content">
                        <strong>11. Mind</strong>
                    </div>
                </div>
                <div class="assessment-card">
                    <div class="assessment-icon-wrapper text-warning">
                        <i class="bi bi-people"></i>
                    </div>
                    <div class="assessment-content">
                        <strong>12. Community</strong>
                    </div>
                </div>
                <div class="assessment-card">
                    <div class="assessment-icon-wrapper text-warning">
                        <i class="bi bi-lightbulb"></i>
                    </div>
                    <div class="assessment-content">
                        <strong>13. Innovation</strong>
                    </div>
                </div>
                <div class="assessment-card">
                    <div class="assessment-icon-wrapper text-success">
                        <i class="bi bi-shield-check"></i>
                    </div>
                    <div class="assessment-content">
                        <strong>14. Safety</strong>
                    </div>
                </div>
                <div class="assessment-card">
                    <div class="assessment-icon-wrapper text-danger">
                        <i class="bi bi-lock"></i>
                    </div>
                    <div class="assessment-content">
                        <strong>15. Security</strong>
                    </div>
                </div>
                <div class="assessment-card">
                    <div class="assessment-icon-wrapper text-secondary">
                        <i class="bi bi-gear"></i>
                    </div>
                    <div class="assessment-content">
                        <strong>16. Services</strong>
                    </div>
                </div>
                <div class="assessment-card">
                    <div class="assessment-icon-wrapper text-primary">
                        <i class="bi bi-robot"></i>
                    </div>
                    <div class="assessment-content">
                        <strong>17. Full Autonomous Buildings</strong>
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
                <a href="{{ route('mega-buildings.index') }}" class="btn btn-light btn-lg" style="border-radius: 50px; padding: 14px 45px; font-weight: 600;">
                    <i class="bi bi-arrow-right-circle me-2"></i>Start Now
                </a>
            </div>
        </div>
    </section>
@endsection
