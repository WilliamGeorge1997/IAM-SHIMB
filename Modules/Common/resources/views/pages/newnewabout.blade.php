@extends('common::layouts.master')

@section('css')
<style>
    :root {
        --primary-blue: #0066cc;
        --dark-blue: #004999;
        --light-gray: #f8f9fa;
    }

    .page-header {
        background: linear-gradient(135deg, var(--primary-blue) 0%, var(--dark-blue) 100%);
        color: white;
        padding: 80px 0;
        text-align: center;
    }

    .about-section {
        padding: 60px 0;
    }

    .info-card {
        background: white;
        border-radius: 15px;
        padding: 30px;
        height: 100%;
        border: 2px solid #e9ecef;
        transition: all 0.3s ease;
    }

    .info-card:hover {
        border-color: var(--primary-blue);
        box-shadow: 0 10px 30px rgba(0, 102, 204, 0.1);
    }

    .section-title {
        font-weight: 700;
        color: var(--dark-blue);
        margin-bottom: 20px;
    }

    .supervisor-card {
        text-align: center;
        padding: 30px;
        background: white;
        border-radius: 15px;
        height: 100%;
        transition: transform 0.3s ease;
        border: 2px solid #e9ecef;
    }

    .supervisor-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(0, 102, 204, 0.15);
    }

    .supervisor-icon {
        width: 80px;
        height: 80px;
        background: linear-gradient(135deg, var(--primary-blue), var(--dark-blue));
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 20px;
        font-size: 2.5rem;
        color: white;
    }

    .building-type-badge {
        display: inline-block;
        padding: 8px 16px;
        background: var(--light-gray);
        border-radius: 20px;
        margin: 5px;
        font-size: 0.9rem;
        transition: background 0.3s ease;
    }

    .building-type-badge:hover {
        background: var(--primary-blue);
        color: white;
    }

    .timeline-item {
        padding-left: 30px;
        position: relative;
        margin-bottom: 25px;
    }

    .timeline-item::before {
        content: '';
        position: absolute;
        left: 0;
        top: 8px;
        width: 15px;
        height: 15px;
        background: var(--primary-blue);
        border-radius: 50%;
    }

    .timeline-item::after {
        content: '';
        position: absolute;
        left: 7px;
        top: 23px;
        width: 2px;
        height: calc(100% + 10px);
        background: #e9ecef;
    }

    .timeline-item:last-child::after {
        display: none;
    }

    .stat-box {
        text-align: center;
        padding: 30px;
        background: linear-gradient(135deg, var(--primary-blue), var(--dark-blue));
        color: white;
        border-radius: 15px;
        height: 100%;
    }

    .stat-number {
        font-size: 3rem;
        font-weight: 700;
        display: block;
        margin-bottom: 10px;
    }
</style>
@endsection

@section('content')
<!-- Page Header -->
<section class="page-header">
    <div class="container">
        <h1 class="display-4 fw-bold mb-3">About IAM-SHIMB</h1>
        <p class="lead">Integrated Assessment Model for Sustainable, Healthy and Intelligent Mega Buildings</p>
    </div>
</section>

<!-- Main Content -->
<section class="about-section">
    <div class="container">
        <!-- Project Overview -->
        <div class="row mb-5">
            <div class="col-12">
                <div class="info-card">
                    <h2 class="section-title">
                        <i class="bi bi-info-circle text-primary me-2"></i>Project Overview
                    </h2>
                    <p class="lead">
                        IAM-SHIMB is a comprehensive web-based assessment tool designed to evaluate and optimize
                        mega buildings across three critical dimensions: Sustainability, Health, and Intelligence.
                    </p>
                    <p>
                        Developed as part of a PhD thesis in Engineering & Environmental Design, this platform
                        provides an integrated approach to building assessment, incorporating 17 distinct assessment
                        groups and multiple evaluation criteria for each category.
                    </p>
                </div>
            </div>
        </div>

        <!-- Statistics -->
        <div class="row g-4 mb-5">
            <div class="col-md-3">
                <div class="stat-box">
                    <span class="stat-number">17</span>
                    <span>Assessment Groups</span>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-box">
                    <span class="stat-number">10</span>
                    <span>Building Types</span>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-box">
                    <span class="stat-number">3</span>
                    <span>Core Dimensions</span>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-box">
                    <span class="stat-number">100%</span>
                    <span>Comprehensive</span>
                </div>
            </div>
        </div>

        <!-- Building Types -->
        <div class="row mb-5">
            <div class="col-12">
                <div class="info-card">
                    <h2 class="section-title">
                        <i class="bi bi-buildings text-primary me-2"></i>Supported Building Types
                    </h2>
                    <p class="mb-4">Our assessment model supports comprehensive evaluation for various building categories:</p>
                    <div>
                        <span class="building-type-badge"><i class="bi bi-house-door me-1"></i> Residential Building</span>
                        <span class="building-type-badge"><i class="bi bi-book me-1"></i> Educational Building</span>
                        <span class="building-type-badge"><i class="bi bi-hospital me-1"></i> Institutional Building</span>
                        <span class="building-type-badge"><i class="bi bi-shop me-1"></i> Commercial Building</span>
                        <span class="building-type-badge"><i class="bi bi-briefcase me-1"></i> Business Building</span>
                        <span class="building-type-badge"><i class="bi bi-gear me-1"></i> Industrial Building</span>
                        <span class="building-type-badge"><i class="bi bi-box me-1"></i> Storage Building</span>
                        <span class="building-type-badge"><i class="bi bi-exclamation-triangle me-1"></i> Hazardous Building</span>
                        <span class="building-type-badge"><i class="bi bi-building me-1"></i> Special Building (free style)</span>
                        <span class="building-type-badge"><i class="bi bi-layers me-1"></i> Multi-Level Car Parking</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Assessment Process -->
        <div class="row mb-5">
            <div class="col-12">
                <div class="info-card">
                    <h2 class="section-title">
                        <i class="bi bi-diagram-3 text-primary me-2"></i>Assessment Process
                    </h2>
                    <div class="timeline-item">
                        <h5><strong>Step 1:</strong> Project Setup</h5>
                        <p>Create a new project or open an existing assessment file</p>
                    </div>
                    <div class="timeline-item">
                        <h5><strong>Step 2:</strong> Building Selection</h5>
                        <p>Choose the building type that matches your project</p>
                    </div>
                    <div class="timeline-item">
                        <h5><strong>Step 3:</strong> Assessment Groups</h5>
                        <p>Navigate through 17 comprehensive assessment categories</p>
                    </div>
                    <div class="timeline-item">
                        <h5><strong>Step 4:</strong> Item Evaluation</h5>
                        <p>Assess items as Essential (No Points) or Optional (Available Points)</p>
                    </div>
                    <div class="timeline-item">
                        <h5><strong>Step 5:</strong> Results & Analysis</h5>
                        <p>Review earned points, available points, and comprehensive reports</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Research Team -->
        <div class="row mb-5">
            <div class="col-12 mb-4">
                <h2 class="section-title text-center">Research Team</h2>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="supervisor-card">
                    <div class="supervisor-icon">
                        <i class="bi bi-person-badge"></i>
                    </div>
                    <h5 class="mb-2">PhD Researcher</h5>
                    <p class="fw-bold mb-1">Esraa Ayman Elgezery</p>
                    <small class="text-muted">Principal Investigator</small>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="supervisor-card">
                    <div class="supervisor-icon">
                        <i class="bi bi-mortarboard"></i>
                    </div>
                    <h5 class="mb-2">Supervisor</h5>
                    <p class="fw-bold mb-1">Prof. Dr. Wael Kamel</p>
                    <small class="text-muted">Construction & Building Engineering<br>AASTMT - Alexandria</small>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="supervisor-card">
                    <div class="supervisor-icon">
                        <i class="bi bi-mortarboard"></i>
                    </div>
                    <h5 class="mb-2">Supervisor</h5>
                    <p class="fw-bold mb-1">Prof. Dr. Sherine Shafik Aly</p>
                    <small class="text-muted">Architecture Engineering & Environmental Design<br>AASTMT - Alexandria</small>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="supervisor-card">
                    <div class="supervisor-icon">
                        <i class="bi bi-mortarboard"></i>
                    </div>
                    <h5 class="mb-2">Supervisor</h5>
                    <p class="fw-bold mb-1">Prof. Dr. Tarek Farghaly</p>
                    <small class="text-muted">Architecture Engineering Department<br>Alexandria University</small>
                </div>
            </div>
        </div>

        <!-- Institution -->
        <div class="row">
            <div class="col-12">
                <div class="info-card text-center">
                    <h2 class="section-title">Academic Institution</h2>
                    <h4 class="text-primary mb-3">Arab Academy for Science, Technology and Maritime Transport (AASTMT)</h4>
                    <p class="mb-2"><strong>College of Engineering and Technology</strong></p>
                    <p>Department of Architecture Engineering & Environmental Design</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
