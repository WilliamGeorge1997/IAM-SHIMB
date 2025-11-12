@extends('common::layouts.master')

@section('css')
@endsection

@section('content')
<section class="sub-hero">
    <div class="container py-5 position-relative">
        <div class="sub-hero-glow"></div>
        <div class="row align-items-center g-5">
            <div class="col-lg-7">
                <span class="hero-tagline text-uppercase letter-spaced text-primary mb-3 d-inline-block">About IAM-SHIMB</span>
                <h1 class="display-5 fw-bold text-dark mb-4">An integrated framework for sustainable, healthy, and intelligent mega buildings</h1>
                <p class="lead text-muted mb-4">
                    IAM-SHIMB is a doctoral research project by Dr. Esraa Ayman Elgezery at AASTMT. The web platform translates academic rigor into a user-friendly interface for benchmarking mega developments against holistic performance criteria.
                </p>
                <div class="d-flex flex-wrap gap-3">
                    <a class="btn btn-primary btn-lg cta-btn">Launch Assessment</a>
                    <a  class="btn btn-outline-primary btn-lg cta-btn cta-btn-outline">View Documentation</a>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="glass-card team-card">
                    <h5 class="text-uppercase letter-spaced-sm text-primary mb-3">Research Leadership</h5>
                    <ul class="list-unstyled mb-4">
                        <li class="mb-3">
                            <strong class="text-dark">PhD Researcher</strong><br>
                            Dr. Esraa Ayman Elgezery
                        </li>
                        <li class="mb-3">
                            <strong class="text-dark">Main Supervisor</strong><br>
                            Prof. Dr. Wael Kamel<br>
                            <small>Construction & Building Engineering Dept.</small>
                        </li>
                        <li class="mb-3">
                            <strong class="text-dark">Co-Supervisor</strong><br>
                            Prof. Dr. Sherine Shafik Aly<br>
                            <small>Architecture Engineering & Environmental Design Dept.</small>
                        </li>
                        <li>
                            <strong class="text-dark">Co-Supervisor</strong><br>
                            Prof. Dr. Tarek Farghaly<br>
                            <small>Architecture Engineering Dept., Alexandria University</small>
                        </li>
                    </ul>
                    <div class="team-highlight">
                        <span class="badge bg-success-subtle text-success text-uppercase letter-spaced-sm">AASTMT Thesis</span>
                        <p class="mb-0 text-muted">Submitted to the College of Engineering & Technology in partial fulfillment of the requirements for the Doctor of Philosophy degree.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section py-5">
    <div class="container">
        <div class="section-heading text-center mb-5">
            <span class="section-kicker">Program Pillars</span>
            <h2 class="fw-bold">Three lenses for evaluating mega buildings</h2>
        </div>
        <div class="row g-4">
            <div class="col-lg-4">
                <div class="value-card h-100">
                    <span class="value-icon value-icon-green"></span>
                    <h4>Holistic Sustainability</h4>
                    <p class="text-muted">Site, environment, energy, and materials indicators ensure resilient and eco-conscious developments.</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="value-card h-100">
                    <span class="value-icon value-icon-orange"></span>
                    <h4>Human-Centric Wellbeing</h4>
                    <p class="text-muted">Indoor environmental quality, acoustic performance, nourishment, and fitness experiences for occupants.</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="value-card h-100">
                    <span class="value-icon value-icon-blue"></span>
                    <h4>Intelligent Readiness</h4>
                    <p class="text-muted">Smart systems, mobility, safety, and AI-assisted services that future-proof complex buildings.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section gradient-section">
    <div class="container">
        <div class="section-heading text-white mb-5">
            <span class="section-kicker text-white-50">Methodology</span>
            <h2 class="fw-bold">Structured scoring that keeps projects aligned</h2>
            <p class="text-white-75">Essential and optional items, classification tags, and point systems combine to provide clarity for every stakeholder.</p>
        </div>
        <div class="row g-4">
            <div class="col-lg-6">
                <div class="glass-card list-card h-100">
                    <h5 class="text-primary text-uppercase letter-spaced-sm mb-3">Assessment Groups</h5>
                    <ul class="mb-0 text-muted">
                        <li>Site & Environment • Air • Water • Energy • Mobility</li>
                        <li>Material • Visual Quality • Acoustic Quality • Nourishment</li>
                        <li>Fitness • Community • Innovation • Life-Safety</li>
                        <li>Security • Services • AI-Full Autonomous Buildings</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="glass-card list-card h-100">
                    <h5 class="text-primary text-uppercase letter-spaced-sm mb-3">Classification Criteria</h5>
                    <ul class="mb-0 text-muted">
                        <li>Each indicator is tagged as Sustainable, Healthy, or Intelligent.</li>
                        <li>Essential items ensure minimum standards; optional items increase attainable points.</li>
                        <li>Icon bar guidance keeps AP and EP metrics visible and accurate.</li>
                        <li>Automated totals help visualise readiness toward 100% completion.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section timeline-section">
    <div class="container">
        <div class="section-heading text-center mb-5">
            <span class="section-kicker">Research Journey</span>
            <h2 class="fw-bold">From academic framework to interactive platform</h2>
        </div>

        <div class="timeline">
            <div class="timeline-item">
                <div class="timeline-bullet"></div>
                <div class="timeline-content">
                    <span class="timeline-date">2019–2020</span>
                    <h5>Framework Development</h5>
                    <p>Research scoping, literature review, and defining megabuilding performance indicators.</p>
                </div>
            </div>
            <div class="timeline-item">
                <div class="timeline-bullet"></div>
                <div class="timeline-content">
                    <span class="timeline-date">2021–2022</span>
                    <h5>Model Validation</h5>
                    <p>Pilot assessments with academic mentors to test weightings, item classifications, and scoring logic.</p>
                </div>
            </div>
            <div class="timeline-item">
                <div class="timeline-bullet"></div>
                <div class="timeline-content">
                    <span class="timeline-date">2023–2024</span>
                    <h5>Digital Implementation</h5>
                    <p>Converted the thesis framework into the IAM-SHIMB web project program with automation and reporting.</p>
                </div>
            </div>
            <div class="timeline-item">
                <div class="timeline-bullet"></div>
                <div class="timeline-content">
                    <span class="timeline-date">2025+</span>
                    <h5>Deployment & Enhancement</h5>
                    <p>Rolling out to mega building stakeholders and refining metrics based on real-world feedback.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="cta-section text-white">
    <div class="container">
        <div class="row align-items-center g-4">
            <div class="col-lg-8">
                <h2 class="mb-3 display-6 fw-bold">Ready to experience the IAM-SHIMB assessment?</h2>
                <p class="mb-0 text-white-75">Follow the guided workflow to capture sustainability, health, and intelligence metrics in one unified platform.</p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a  class="btn btn-light btn-lg cta-btn text-primary">Launch Assessment</a>
            </div>
        </div>
    </div>
</section>
@endsection

@section('js')
@endsection