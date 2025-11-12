@extends('common::layouts.master')

@section('css')
@endsection

@section('content')
<section class="sub-hero position-relative overflow-hidden">
    <div class="container py-5">
        <div class="row g-5 align-items-center">
            <div class="col-lg-7">
                <span class="hero-tagline text-uppercase text-primary fw-semibold letter-spaced d-inline-block mb-3">About IAM-SHIMB</span>
                <h1 class="display-5 fw-bold text-dark mb-4">Integrated Assessment Model for Sustainable, Healthy & Intelligent Mega Buildings</h1>
                <p class="lead text-muted mb-4">
                    IAM-SHIMB is a doctoral research program by Dr. Esraa Ayman Elgezery within AASTMT’s College of Engineering & Technology. The platform captures holistic performance across social, environmental, and technological domains to guide mega building developments.
                </p>
                <a  class="btn btn-primary btn-lg cta-btn">Launch Assessment</a>
            </div>
            <div class="col-lg-5">
                <div class="team-card shadow-sm">
                    <h5 class="text-uppercase letter-spaced-sm text-primary mb-4">Research Leadership</h5>
                    <ul class="list-unstyled mb-0">
                        <li class="mb-3">
                            <strong>PhD Researcher</strong><br>
                            Dr. Esraa Ayman Elgezery
                        </li>
                        <li class="mb-3">
                            <strong>Main Supervisor</strong><br>
                            Prof. Dr. Wael Kamel — Construction & Building Engineering Dept.
                        </li>
                        <li class="mb-3">
                            <strong>Co-Supervisor</strong><br>
                            Prof. Dr. Sherine Shafik Aly — Architecture Engineering & Environmental Design Dept.
                        </li>
                        <li>
                            <strong>Co-Supervisor</strong><br>
                            Prof. Dr. Tarek Farghaly — Architecture Engineering Dept., Alexandria University
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="section-heading mb-4">
            <span class="section-kicker">Program Vision</span>
            <h2 class="fw-bold">Why IAM-SHIMB matters</h2>
        </div>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="value-card h-100">
                    <h5>Holistic Sustainability</h5>
                    <p class="text-muted mb-0">Integrates environmental stewardship, resilience, and resource efficiency benchmarks for mega projects.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="value-card h-100">
                    <h5>Human-Centric Wellbeing</h5>
                    <p class="text-muted mb-0">Prioritises comfort, health, accessibility, and community vibrancy through measurable indicators.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="value-card h-100">
                    <h5>Intelligent Readiness</h5>
                    <p class="text-muted mb-0">Evaluates digital infrastructure, smart services, and future-proof capabilities for adaptive buildings.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-light">
    <div class="container">
        <div class="section-heading mb-4">
            <span class="section-kicker">Methodology</span>
            <h2 class="fw-bold">Structured assessment groups and scoring logic</h2>
            <p class="text-muted mb-0">The platform is divided into themed assessment groups, each containing essential and optional items with associated available points (AP) and earned points (EP).</p>
        </div>
        <div class="row g-4">
            <div class="col-lg-6">
                <div class="list-card h-100">
                    <h5 class="text-uppercase letter-spaced-sm text-primary mb-3">Assessment Groups</h5>
                    <ul class="mb-0">
                        <li>Site & Environment • Air • Water • Energy</li>
                        <li>Mobility • Material • Visual Quality • Acoustic Quality</li>
                        <li>Nourishment • Fitness • Community • Innovation</li>
                        <li>Life-Safety • Security • Services • AI-Full Autonomous Buildings</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="list-card h-100">
                    <h5 class="text-uppercase letter-spaced-sm text-primary mb-3">Classification Criteria</h5>
                    <ul class="mb-0">
                        <li>Each item tagged as <strong>Sustainable</strong>, <strong>Healthy</strong>, or <strong>Intelligent</strong>.</li>
                        <li>Essential items are mandatory (no points) and ensure baseline performance.</li>
                        <li>Optional items provide additional points to raise the AP and EP totals.</li>
                        <li>Automated calculations summarise progress within the icon bar dashboard.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="section-heading mb-4">
            <span class="section-kicker">Implementation Journey</span>
            <h2 class="fw-bold">Milestones of the IAM-SHIMB thesis project</h2>
        </div>
        <div class="timeline">
            <div class="timeline-item">
                <span class="timeline-date">2019–2020</span>
                <div class="timeline-content">
                    <h5>Research Scoping</h5>
                    <p class="text-muted mb-0">Established assessment objectives, literature framework, and stakeholder interviews.</p>
                </div>
            </div>
            <div class="timeline-item">
                <span class="timeline-date">2021–2022</span>
                <div class="timeline-content">
                    <h5>Model Development</h5>
                    <p class="text-muted mb-0">Defined indicators, scoring logic, and pilot-tested with academic supervision board.</p>
                </div>
            </div>
            <div class="timeline-item">
                <span class="timeline-date">2023–2024</span>
                <div class="timeline-content">
                    <h5>Digital Platform</h5>
                    <p class="text-muted mb-0">Translated thesis framework into the IAM-SHIMB web project program with automated reporting.</p>
                </div>
            </div>
            <div class="timeline-item">
                <span class="timeline-date">2025+</span>
                <div class="timeline-content">
                    <h5>Deployment & Continuous Improvement</h5>
                    <p class="text-muted mb-0">Supporting mega building projects and gathering feedback for iterative enhancements.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-primary text-white">
    <div class="container">
        <div class="row align-items-center g-4">
            <div class="col-lg-8">
                <h2 class="mb-3">Ready to evaluate your project?</h2>
                <p class="mb-0">Launch IAM-SHIMB to follow the guided workflow, customise sensor data, and present quantitative insights to stakeholders.</p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a class="btn btn-light btn-lg cta-btn text-primary">Start Now</a>
            </div>
        </div>
    </div>
</section>
@endsection

@section('js')
@endsection