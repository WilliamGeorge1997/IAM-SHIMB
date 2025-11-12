@extends('common::layouts.master')

@section('css')
@endsection

@section('content')
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <div class="d-inline-flex align-items-center gap-3 mb-3 hero-badge">
                    <span class="badge rounded-pill bg-primary text-uppercase">IAM-SHIMB</span>
                    <small class="text-primary fw-semibold text-uppercase letter-spaced">Integrated Assessment Model</small>
                </div>
                <h1 class="hero-title mb-4">Sustainable, Healthy & Intelligent Mega Buildings Assessment</h1>
                <p class="hero-subtitle mb-4">
                    AASTMT’s web program empowers decision-makers to measure sustainability, wellbeing, and smart-readiness for future-focused mega projects.
                </p>
                <div class="d-flex flex-wrap gap-3">
                    <a  class="btn btn-success btn-lg cta-btn shadow-sm">Start Assessment</a>
                    <a  class="btn btn-outline-primary btn-lg cta-btn cta-btn-outline">About the Program</a>
                    <a  class="btn btn-primary btn-lg cta-btn">Help Center</a>
                    <a  class="btn btn-secondary btn-lg cta-btn">Print Reports</a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="floating-card p-4 p-md-5">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h5 class="mb-0 text-primary fw-bold text-uppercase letter-spaced-sm">Research & Oversight</h5>
                        <span class="badge bg-light text-primary text-uppercase">AASTMT</span>
                    </div>
                    <img src="{{ asset('assets/images/logo.webp') }}" class="img-fluid mb-4" alt="AASTMT Logo">
                    <p class="text-muted mb-0">
                        PhD Researcher: <strong>Dr. Esraa Ayman Elgezery</strong>
                    </p>
                </div>
                <div class="professors-card mt-4 p-4 p-md-5">
                    <h5 class="mb-4 text-uppercase letter-spaced-sm">Supervision Board</h5>
                    <ul class="mb-0">
                        <li>
                            <strong>Prof. Dr. Wael Kamel</strong><br>
                            Construction & Building Engineering Department
                        </li>
                        <li>
                            <strong>Prof. Dr. Sherine Shafik Aly</strong><br>
                            Architecture Engineering & Environmental Design Department
                        </li>
                        <li>
                            <strong>Prof. Dr. Tarek Farghaly</strong><br>
                            Architecture Engineering Department, Faculty of Engineering, Alexandria University
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-light">
    <div class="container">
        <div class="section-heading mb-4">
            <span class="section-kicker">Program at a Glance</span>
            <h2 class="fw-bold">Real-time indicators that guide your project decisions</h2>
            <p class="text-muted mb-0">Follow the gauges to benchmark where your building stands across sustainability, health, and intelligence dimensions.</p>
        </div>
        <div class="row g-4">
            <div class="col-md-6 col-xl-3">
                <div class="data-metric h-100">
                    <div class="metric-header">
                        <span class="metric-label text-uppercase">Overall Earned Points</span>
                        <span class="badge bg-success-subtle text-success fw-semibold">54 / 60</span>
                    </div>
                    <h3 class="metric-value">90% Completion</h3>
                    <p class="metric-description">Your current assessment captures the majority of IAM-SHIMB essential indicators.</p>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="data-metric h-100">
                    <span class="metric-label text-uppercase text-warning">Sustainable Healthy Intelligent Building</span>
                    <h3 class="metric-value">87 / 99</h3>
                    <p class="metric-description">Balanced score across environment, energy, mobility, and innovation groups.</p>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="data-metric h-100">
                    <span class="metric-label text-uppercase text-info">Healthy Building</span>
                    <h3 class="metric-value">59 / 66</h3>
                    <p class="metric-description">Indoor air quality, acoustic comfort, and wellbeing metrics remain strong.</p>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="data-metric h-100">
                    <span class="metric-label text-uppercase text-primary">Intelligent Building</span>
                    <h3 class="metric-value">54 / 60</h3>
                    <p class="metric-description">Digital infrastructure and smart services position the project for future demands.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="section-heading mb-4">
            <span class="section-kicker">Guided Workflow</span>
            <h2 class="fw-bold">Follow the automated journey—or take manual control when needed</h2>
            <p class="text-muted mb-0">Use the icon bar to open files, add new projects, and export reports at any stage.</p>
        </div>
        <div class="row g-4 align-items-stretch">
            <div class="col-lg-4">
                <div class="instruction-card h-100">
                    <h5 class="mb-3 text-primary text-uppercase letter-spaced-sm">Icon Bar Essentials</h5>
                    <ul class="list-unstyled mb-0">
                        <li><strong>New / Open:</strong> Start a fresh evaluation or continue an existing study.</li>
                        <li><strong>Save / Save As:</strong> Secure iterations for comparison.</li>
                        <li><strong>Print / Export:</strong> Share progress with stakeholders instantly.</li>
                        <li><strong>Info:</strong> Access program notes, definitions, and scoring rubrics.</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="row g-3 tool-tabs">
                    <div class="col-sm-6 col-lg-4">
                        <div class="tool-tab active">
                            <span class="tool-title">Project</span>
                            <p class="tool-description">Capture project metadata, stakeholders, and baseline data.</p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div class="tool-tab">
                            <span class="tool-title">Type of Building</span>
                            <p class="tool-description">Residential, educational, institutional, industrial, and more.</p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div class="tool-tab">
                            <span class="tool-title">Assessment Groups</span>
                            <p class="tool-description">Environment, mobility, innovation, water, safety, community quality.</p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div class="tool-tab">
                            <span class="tool-title">Group Items</span>
                            <p class="tool-description">Detailed indicators mapped to essential or optional scoring.</p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div class="tool-tab">
                            <span class="tool-title">Item Classification</span>
                            <p class="tool-description">Tag each item as Sustainable, Healthy, or Intelligent.</p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div class="tool-tab">
                            <span class="tool-title">Available Points</span>
                            <p class="tool-description">Monitor allocated vs. earned points to maintain balance.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-light">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-4">
                <div class="step-card h-100">
                    <h5 class="text-uppercase text-primary letter-spaced-sm mb-3">1. Prepare</h5>
                    <p class="text-muted mb-0">Review “Type of Building” categories and gather documentation for site, energy, mobility, and materials data.</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="step-card h-100">
                    <h5 class="text-uppercase text-primary letter-spaced-sm mb-3">2. Assess</h5>
                    <p class="text-muted mb-0">Complete group items, flag essential requirements, and attach supporting evidence where relevant.</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="step-card h-100">
                    <h5 class="text-uppercase text-primary letter-spaced-sm mb-3">3. Communicate</h5>
                    <p class="text-muted mb-0">Generate printable dashboards to share with the supervision board and project stakeholders.</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('js')
@endsection