@extends('common::layouts.master')

@section('css')
@endsection

@section('content')
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container hero-content">
            <div class="row align-items-center">
                <div class="col-12 col-lg-7">
                    <h1 class="hero-title">IAM-SHIMB</h1>
                    <h3 class="hero-subtitle">Integrated Assessment Model for Sustainable, Healthy and Intelligent Mega
                        Buildings</h3>
                    <p class="hero-description">
                        A comprehensive web-based platform for evaluating and optimizing building sustainability,
                        health, and intelligence across multiple assessment criteria. Transform your building projects
                        with data-driven insights and cutting-edge evaluation tools.
                    </p>
                    <div class="hero-actions d-flex flex-wrap gap-3">
                        <a class="btn btn-custom btn-lg">
                            <span><i class="bi bi-play-circle me-2"></i>Start Assessment</span>
                        </a>
                        <a href="{{ route('about') }}" class="btn btn-outline-light btn-lg">
                            <i class="bi bi-info-circle me-2"></i>Learn More
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

    <!-- Statistics Section -->
    <section class="section-spacing fade-in">
        <div class="container">
            <div class="row g-4 text-center">
                <div class="col-md-3 col-6">
                    <div class="card stat-card">
                        <div class="stat-icon">
                            <i class="bi bi-grid-3x3-gap"></i>
                        </div>
                        <h3 class="stat-number">10</h3>
                        <p class="stat-label">Building Types</p>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="card stat-card">
                        <div class="stat-icon">
                            <i class="bi bi-list-check"></i>
                        </div>
                        <h3 class="stat-number">17</h3>
                        <p class="stat-label">Assessment Groups</p>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="card stat-card">
                        <div class="stat-icon">
                            <i class="bi bi-shield-check"></i>
                        </div>
                        <h3 class="stat-number">3</h3>
                        <p class="stat-label">Core Pillars</p>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="card stat-card">
                        <div class="stat-icon">
                            <i class="bi bi-graph-up-arrow"></i>
                        </div>
                        <h3 class="stat-number">100%</h3>
                        <p class="stat-label">Automated Scoring</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="section-spacing bg-light-custom fade-in">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title">Key Features</h2>
                <p class="section-subtitle">Comprehensive building assessment across multiple dimensions</p>
            </div>

            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card feature-card-v2 text-center">
                        <div class="feature-icon-v2">
                            <i class="bi bi-recycle"></i>
                        </div>
                        <h4 class="mb-3 fw-bold">Sustainable</h4>
                        <p class="text-muted mb-0">
                            Evaluate environmental impact, energy efficiency, and resource management
                            for eco-friendly buildings that minimize their carbon footprint.
                        </p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card feature-card-v2 text-center">
                        <div class="feature-icon-v2">
                            <i class="bi bi-heart-pulse"></i>
                        </div>
                        <h4 class="mb-3 fw-bold">Healthy</h4>
                        <p class="text-muted mb-0">
                            Assess air quality, water quality, acoustic comfort, and nourishment
                            to ensure optimal occupant wellbeing and productivity.
                        </p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card feature-card-v2 text-center">
                        <div class="feature-icon-v2">
                            <i class="bi bi-cpu"></i>
                        </div>
                        <h4 class="mb-3 fw-bold">Intelligent</h4>
                        <p class="text-muted mb-0">
                            Analyze smart technologies, automation, security systems, and innovative
                            solutions for next-generation intelligent buildings.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works Section -->
    <section class="section-spacing fade-in">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title">How It Works</h2>
                <p class="section-subtitle">Simple steps to evaluate your building project</p>
            </div>

            <div class="row g-4">
                <div class="col-md-3">
                    <div class="card step-card text-center">
                        <div class="step-number">1</div>
                        <h5 class="mb-3 fw-bold">Start Assessment</h5>
                        <p class="text-muted mb-0 small">
                            Create a new project and select your building type.
                        </p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card step-card text-center">
                        <div class="step-number">2</div>
                        <h5 class="mb-3 fw-bold">Complete Groups</h5>
                        <p class="text-muted mb-0 small">
                            Evaluate your building across 17 assessment groups.
                        </p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card step-card text-center">
                        <div class="step-number">3</div>
                        <h5 class="mb-3 fw-bold">Get Scores</h5>
                        <p class="text-muted mb-0 small">
                            View automated calculations of Available Points (AP) and Earned Points (EP).
                        </p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card step-card text-center">
                        <div class="step-number">4</div>
                        <h5 class="mb-3 fw-bold">View Reports</h5>
                        <p class="text-muted mb-0 small">
                            Generate comprehensive reports and insights for stakeholders.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Benefits Section -->
    <section class="section-spacing bg-light-custom fade-in">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title">Why Choose IAM-SHIMB</h2>
                <p class="section-subtitle">Comprehensive benefits for your building projects</p>
            </div>

            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card benefit-card text-center">
                        <div class="benefit-icon">
                            <i class="bi bi-check-circle"></i>
                        </div>
                       <h5 class="mb-3 fw-bold">Comprehensive Coverage</h5>
                        <p class="text-muted mb-0">
                            Evaluate all aspects of your building from sustainability and health to intelligent systems in one integrated platform.
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card benefit-card text-center">
                        <div class="benefit-icon">
                            <i class="bi bi-speedometer2"></i>
                        </div>
                        <h5 class="mb-3 fw-bold">Automated Calculations</h5>
                        <p class="text-muted mb-0">
                            Real-time scoring system automatically calculates AP and EP, saving time and ensuring accuracy.
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card benefit-card text-center">
                        <div class="benefit-icon">
                            <i class="bi bi-file-earmark-text"></i>
                        </div>
                        <h5 class="mb-3 fw-bold">Comprehensive Reports</h5>
                        <p class="text-muted mb-0">
                            Generate detailed reports and visualizations to present findings to stakeholders and
                            decision-makers.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="section-spacing fade-in">
        <div class="container">
            <div class="cta-section text-center">
                <h2 class="section-title mb-4">Ready to Assess Your Building?</h2>
                <p class="lead mb-4">Start evaluating your project with our comprehensive assessment model</p>
                <a class="btn btn-light btn-lg" style="border-radius: 50px; padding: 14px 45px; font-weight: 600;">
                    <i class="bi bi-arrow-right-circle me-2"></i>Get Started Now
                </a>
            </div>
        </div>
    </section>
@endsection
