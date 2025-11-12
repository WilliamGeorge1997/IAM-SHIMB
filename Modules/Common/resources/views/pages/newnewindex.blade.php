@extends('common::layouts.master')

@section('css')
<style>
    :root {
        --primary-blue: #0066cc;
        --dark-blue: #004999;
        --light-gray: #f8f9fa;
    }

    .hero-section {
        background: linear-gradient(135deg, var(--primary-blue) 0%, var(--dark-blue) 100%);
        color: white;
        padding: 100px 0;
        position: relative;
        overflow: hidden;
    }

    .hero-section::before {
        content: '';
        position: absolute;
        top: 0;
        right: 0;
        width: 50%;
        height: 100%;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 200"><path d="M50,150 L50,50 L150,50 L150,80 L180,80 L180,150 Z" fill="rgba(255,255,255,0.1)" stroke="rgba(255,255,255,0.2)" stroke-width="2"/><circle cx="120" cy="100" r="8" fill="rgba(255,255,255,0.3)"/></svg>') no-repeat center;
        background-size: contain;
        opacity: 0.3;
    }

    .hero-content {
        position: relative;
        z-index: 1;
    }

    .feature-card {
        border: none;
        border-radius: 15px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        height: 100%;
        background: white;
    }

    .feature-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 40px rgba(0, 102, 204, 0.15);
    }

    .feature-icon {
        width: 70px;
        height: 70px;
        background: linear-gradient(135deg, var(--primary-blue), var(--dark-blue));
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 20px;
        font-size: 2rem;
        color: white;
    }

    .btn-custom {
        background: linear-gradient(135deg, var(--primary-blue), var(--dark-blue));
        border: none;
        padding: 12px 40px;
        border-radius: 50px;
        color: white;
        font-weight: 600;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .btn-custom:hover {
        transform: scale(1.05);
        box-shadow: 0 10px 30px rgba(0, 102, 204, 0.3);
        color: white;
    }

    .section-title {
        font-weight: 700;
        color: var(--dark-blue);
        margin-bottom: 15px;
    }

    .assessment-group {
        background: var(--light-gray);
        border-radius: 10px;
        padding: 15px 20px;
        margin-bottom: 10px;
        transition: background 0.3s ease;
    }

    .assessment-group:hover {
        background: #e9ecef;
    }

    .navbar-brand img {
        max-height: 60px;
    }
</style>
@endsection

@section('content')
<!-- Hero Section -->
<section class="hero-section">
    <div class="container hero-content">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <h1 class="display-4 fw-bold mb-4">IAM-SHIMB</h1>
                <h3 class="mb-4">Integrated Assessment Model for Sustainable, Healthy and Intelligent Mega Buildings</h3>
                <p class="lead mb-4">
                    A comprehensive web-based platform for evaluating and optimizing building sustainability,
                    health, and intelligence across multiple assessment criteria.
                </p>
                <div class="d-flex gap-3">
                    <a  class="btn btn-custom btn-lg">
                        <i class="bi bi-play-circle me-2"></i>Start Assessment
                    </a>
                    <a href="{{ route('about') }}" class="btn btn-outline-light btn-lg">Learn More</a>
                </div>
            </div>
            <div class="col-lg-5 text-center d-none d-lg-block">
                <i class="bi bi-building" style="font-size: 200px; opacity: 0.8;"></i>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title">Key Features</h2>
            <p class="text-muted">Comprehensive building assessment across multiple dimensions</p>
        </div>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="card feature-card p-4 text-center">
                    <div class="feature-icon">
                        <i class="bi bi-recycle"></i>
                    </div>
                    <h4 class="mb-3">Sustainable</h4>
                    <p class="text-muted">Evaluate environmental impact, energy efficiency, and resource management for eco-friendly buildings.</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card feature-card p-4 text-center">
                    <div class="feature-icon">
                        <i class="bi bi-heart-pulse"></i>
                    </div>
                    <h4 class="mb-3">Healthy</h4>
                    <p class="text-muted">Assess air quality, water quality, acoustic comfort, and nourishment for occupant wellbeing.</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card feature-card p-4 text-center">
                    <div class="feature-icon">
                        <i class="bi bi-cpu"></i>
                    </div>
                    <h4 class="mb-3">Intelligent</h4>
                    <p class="text-muted">Analyze smart technologies, automation, security systems, and innovative solutions.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Assessment Groups Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title">17 Assessment Groups</h2>
            <p class="text-muted">Comprehensive evaluation across all building aspects</p>
        </div>

        <div class="row">
            <div class="col-lg-6 mb-3">
                <div class="assessment-group">
                    <i class="bi bi-tree text-success me-2"></i>
                    <strong>Site & Environment</strong>
                </div>
            </div>
            <div class="col-lg-6 mb-3">
                <div class="assessment-group">
                    <i class="bi bi-wind text-primary me-2"></i>
                    <strong>Air Quality</strong>
                </div>
            </div>
            <div class="col-lg-6 mb-3">
                <div class="assessment-group">
                    <i class="bi bi-droplet text-info me-2"></i>
                    <strong>Water Management</strong>
                </div>
            </div>
            <div class="col-lg-6 mb-3">
                <div class="assessment-group">
                    <i class="bi bi-lightning-charge text-warning me-2"></i>
                    <strong>Energy Efficiency</strong>
                </div>
            </div>
            <div class="col-lg-6 mb-3">
                <div class="assessment-group">
                    <i class="bi bi-car-front text-secondary me-2"></i>
                    <strong>Mobility & Access</strong>
                </div>
            </div>
            <div class="col-lg-6 mb-3">
                <div class="assessment-group">
                    <i class="bi bi-bricks text-danger me-2"></i>
                    <strong>Material Selection</strong>
                </div>
            </div>
            <div class="col-lg-6 mb-3">
                <div class="assessment-group">
                    <i class="bi bi-eye text-dark me-2"></i>
                    <strong>Visual Quality</strong>
                </div>
            </div>
            <div class="col-lg-6 mb-3">
                <div class="assessment-group">
                    <i class="bi bi-soundwave text-primary me-2"></i>
                    <strong>Acoustic Quality</strong>
                </div>
            </div>
            <div class="col-lg-6 mb-3">
                <div class="assessment-group">
                    <i class="bi bi-heart text-danger me-2"></i>
                    <strong>Nourishment & Wellness</strong>
                </div>
            </div>
            <div class="col-lg-6 mb-3">
                <div class="assessment-group">
                    <i class="bi bi-activity text-success me-2"></i>
                    <strong>Fitness & Activity</strong>
                </div>
            </div>
            <div class="col-lg-6 mb-3">
                <div class="assessment-group">
                    <i class="bi bi-brain text-info me-2"></i>
                    <strong>Mind & Cognition</strong>
                </div>
            </div>
            <div class="col-lg-6 mb-3">
                <div class="assessment-group">
                    <i class="bi bi-people text-warning me-2"></i>
                    <strong>Community & Social</strong>
                </div>
            </div>
            <div class="col-lg-6 mb-3">
                <div class="assessment-group">
                    <i class="bi bi-lightbulb text-warning me-2"></i>
                    <strong>Innovation</strong>
                </div>
            </div>
            <div class="col-lg-6 mb-3">
                <div class="assessment-group">
                    <i class="bi bi-shield-check text-success me-2"></i>
                    <strong>Safety & Protection</strong>
                </div>
            </div>
            <div class="col-lg-6 mb-3">
                <div class="assessment-group">
                    <i class="bi bi-lock text-danger me-2"></i>
                    <strong>Security Systems</strong>
                </div>
            </div>
            <div class="col-lg-6 mb-3">
                <div class="assessment-group">
                    <i class="bi bi-gear text-secondary me-2"></i>
                    <strong>Services & Facilities</strong>
                </div>
            </div>
            <div class="col-lg-6 mb-3">
                <div class="assessment-group">
                    <i class="bi bi-robot text-primary me-2"></i>
                    <strong>AI-Full Autonomous Buildings</strong>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-5">
    <div class="container text-center">
        <h2 class="section-title mb-4">Ready to Assess Your Building?</h2>
        <p class="lead text-muted mb-4">Start evaluating your project with our comprehensive assessment model</p>
        <a class="btn btn-custom btn-lg">
            <i class="bi bi-arrow-right-circle me-2"></i>Get Started Now
        </a>
    </div>
</section>
@endsection
