@extends('common::layouts.master')

@section('css')
@endsection

@section('content')
<section class="hero-section">
    <div class="container position-relative">
        <div class="hero-orb hero-orb-one"></div>
        <div class="hero-orb hero-orb-two"></div>

        <div class="row align-items-center g-5 position-relative">
            <div class="col-xl-6">
                <span class="hero-tagline text-uppercase letter-spaced text-primary mb-3 d-inline-flex align-items-center gap-2">
                    <span class="badge bg-primary text-white rounded-pill px-3 py-2 fw-semibold">IAM-SHIMB</span>
                    Integrated Assessment Model
                </span>
                <h1 class="hero-title display-4 fw-bold text-white">Evaluate Mega Buildings for a Smarter, Healthier Tomorrow</h1>
                <p class="hero-subtitle text-white-50">
                    Built at the Arab Academy for Science, Technology & Maritime Transport, IAM-SHIMB transforms complex criteria into clear insights—covering sustainability, wellbeing, and intelligent readiness for mega projects.
                </p>
                <div class="d-flex flex-wrap gap-3 mt-4">
                    <a class="btn btn-success btn-lg cta-btn shadow-sm">Start Assessment</a>
                    <a class="btn btn-outline-light btn-lg cta-btn cta-btn-outline">About the Program</a>
                    <a class="btn btn-primary btn-lg cta-btn">Help Center</a>
                    <a class="btn btn-secondary btn-lg cta-btn">Print Reports</a>
                </div>
                <div class="hero-stats mt-5">
                    <div class="hero-stat">
                        <h3>40+ indicators</h3>
                        <p>Covering environment, mobility, wellbeing, innovation, and safety.</p>
                    </div>
                    <div class="hero-stat">
                        <h3>Automated</h3>
                        <p>Dynamic calculations for Available Points (AP) and Earned Points (EP).</p>
                    </div>
                    <div class="hero-stat">
                        <h3>Supervisor-led</h3>
                        <p>Guided by leading researchers in sustainable architecture.</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="glass-card highlight-card p-4 p-lg-5">
                    <div class="d-flex justify-content-between align-items-start mb-4">
                        <div>
                            <span class="badge bg-info-subtle text-info text-uppercase letter-spaced-sm">Research Program</span>
                            <h4 class="mt-2 mb-0 text-primary fw-bold">IAM-SHIMB Web Project Program</h4>
                        </div>
                        <img src="{{ asset('assets/images/logo.webp') }}" alt="AASTMT Logo" class="brand-logo">
                    </div>
                    <p class="lead text-muted mb-4">
                        Part of a doctoral thesis submitted to AASTMT’s Department of Architecture Engineering & Environmental Design.
                    </p>

                    <div class="supervision-grid">
                        <div class="supervisor-tile">
                            <span class="tile-label">PhD Researcher</span>
                            <strong>Dr. Esraa Ayman Elgezery</strong>
                        </div>
                        <div class="supervisor-tile">
                            <span class="tile-label">Main Supervisor</span>
                            <strong>Prof. Dr. Wael Kamel</strong>
                            <small>Construction & Building Engineering Dept.</small>
                        </div>
                        <div class="supervisor-tile">
                            <span class="tile-label">Co-Supervisor</span>
                            <strong>Prof. Dr. Sherine Shafik Aly</strong>
                            <small>Architecture Engineering & Environmental Design Dept.</small>
                        </div>
                        <div class="supervisor-tile">
                            <span class="tile-label">Co-Supervisor</span>
                            <strong>Prof. Dr. Tarek Farghaly</strong>
                            <small>Architecture Engineering Dept., Alexandria University</small>
                        </div>
                    </div>

                    <div class="floating-metrics mt-4">
                        <div>
                            <span class="metric-tag text-uppercase">Earned Points</span>
                            <h3 class="metric-value text-success">54 / 60</h3>
                        </div>
                        <div>
                            <span class="metric-tag text-uppercase">Completion</span>
                            <h3 class="metric-value text-primary">90%</h3>
                        </div>
                        <div>
                            <span class="metric-tag text-uppercase">Assessment<br>Groups</span>
                            <h3 class="metric-value text-warning">17</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section wave-section">
    <div class="container">
        <div class="section-heading text-center mb-5">
            <span class="section-kicker">Dashboard Preview</span>
            <h2 class="fw-bold">Measure progress across sustainability, health, and intelligence gauges</h2>
            <p class="text-muted">Real-time summaries show how projects perform against essential and optional items in each assessment group.</p>
        </div>

        <div class="row g-4">
            <div class="col-md-6 col-xl-3">
                <div class="metric-card h-100">
                    <div class="metric-circle metric-success">
                        <span>90%</span>
                    </div>
                    <h5>Overall Earned Points</h5>
                    <p class="text-muted">Your current assessment satisfies the majority of IAM-SHIMB requirements.</p>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="metric-card h-100">
                    <div class="metric-circle metric-warning">
                        <span>87</span>
                    </div>
                    <h5>Sustainable Healthy Intelligent</h5>
                    <p class="text-muted">Balanced performance across environmental and wellbeing indicators.</p>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="metric-card h-100">
                    <div class="metric-circle metric-info">
                        <span>59</span>
                    </div>
                    <h5>Healthy Building</h5>
                    <p class="text-muted">Strength in indoor air quality, acoustic comfort, and nourishment.</p>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="metric-card h-100">
                    <div class="metric-circle metric-primary">
                        <span>54</span>
                    </div>
                    <h5>Intelligent Building</h5>
                    <p class="text-muted">Digital infrastructure and smart services ready for future demands.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section highlight-section">
    <div class="container">
        <div class="section-heading text-center text-white mb-5">
            <span class="section-kicker text-white-50">Guided Workflow</span>
            <h2 class="fw-bold">Follow the steps, or take manual control at any time</h2>
        </div>

        <div class="row g-4">
            <div class="col-lg-4">
                <div class="workflow-card h-100">
                    <span class="workflow-number">01</span>
                    <h4>Project Setup</h4>
                    <p>Kick off a new evaluation or open an existing file. Define project scope, building type, and stakeholders in minutes.</p>
                    <ul class="list-unstyled mt-3 mb-0">
                        <li>• New & Open project management</li>
                        <li>• Automatic save reminders</li>
                        <li>• Quick info tips for each input</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="workflow-card h-100">
                    <span class="workflow-number">02</span>
                    <h4>Assessment Journey</h4>
                    <p>Navigate assessment groups via the top icon bar. Classify each item as sustainable, healthy, or intelligent.</p>
                    <ul class="list-unstyled mt-3 mb-0">
                        <li>• Essential vs. Optional items</li>
                        <li>• Earned vs. Available points tracker</li>
                        <li>• Instant completion percentages</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="workflow-card h-100">
                    <span class="workflow-number">03</span>
                    <h4>Insights & Reporting</h4>
                    <p>Export polished summaries, share progress, or print reports to present findings to the supervision board.</p>
                    <ul class="list-unstyled mt-3 mb-0">
                        <li>• Share and export actions</li>
                        <li>• Beautiful print templates</li>
                        <li>• Guidance from supervisors</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section info-section">
    <div class="container">
        <div class="section-heading text-center mb-5">
            <span class="section-kicker">Assessment Canvas</span>
            <h2 class="fw-bold">Structured interface for consistent scoring</h2>
        </div>

        <div class="row g-4 align-items-stretch">
            <div class="col-xl-5">
                <div class="glass-card info-card h-100">
                    <h5 class="text-primary text-uppercase letter-spaced-sm mb-3">Icon Bar Shortcuts</h5>
                    <ul class="list-unstyled text-muted mb-4">
                        <li><strong>New:</strong> Start a fresh evaluation.</li>
                        <li><strong>Open:</strong> Resume stored datasets.</li>
                        <li><strong>Save / Save As:</strong> Track versions.</li>
                        <li><strong>Print:</strong> Instant reports.</li>
                        <li><strong>Share / Export:</strong> Present results beyond the platform.</li>
                        <li><strong>Close:</strong> Wrap up safely with checkpoints.</li>
                    </ul>
                    <div class="glass-subcard">
                        <span class="badge bg-primary-subtle text-primary text-uppercase letter-spaced-sm mb-2">Tip</span>
                        <p class="mb-0 text-muted">The interface runs automatically. Follow the prompts, or switch to manual input using the icon bar whenever you need to override.</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-7">
                <div class="grid-layout">
                    <div class="grid-tile">
                        <span class="tile-heading text-uppercase letter-spaced-sm">Project</span>
                        <p>Project definition, baseline data, stakeholders.</p>
                    </div>
                    <div class="grid-tile">
                        <span class="tile-heading text-uppercase letter-spaced-sm">Type of Building</span>
                        <p>Residential, educational, institutional, industrial, business, storage, parking, and more.</p>
                    </div>
                    <div class="grid-tile">
                        <span class="tile-heading text-uppercase letter-spaced-sm">Assessment Groups</span>
                        <p>Environment, air, water, energy, mobility, material, innovation, safety, AI-autonomous.</p>
                    </div>
                    <div class="grid-tile">
                        <span class="tile-heading text-uppercase letter-spaced-sm">Group Items</span>
                        <p>Detailed indicators with evidence fields.</p>
                    </div>
                    <div class="grid-tile">
                        <span class="tile-heading text-uppercase letter-spaced-sm">Item Classification</span>
                        <p>Tag each item as sustainable, healthy, or intelligent.</p>
                    </div>
                    <div class="grid-tile">
                        <span class="tile-heading text-uppercase letter-spaced-sm">Item Types</span>
                        <p>Essential (no points) or optional (available points).</p>
                    </div>
                    <div class="grid-tile">
                        <span class="tile-heading text-uppercase letter-spaced-sm">Available Points (AP)</span>
                        <p>Allocated weightings for each group.</p>
                    </div>
                    <div class="grid-tile">
                        <span class="tile-heading text-uppercase letter-spaced-sm">Earned Points (EP)</span>
                        <p>Automated calculations showing progress toward 100%.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="cta-section text-white">
    <div class="container">
        <div class="row align-items-center g-4">
            <div class="col-lg-8">
                <h2 class="mb-3 display-6 fw-bold">Ready to position your mega building for the future?</h2>
                <p class="mb-0 text-white-75">Launch IAM-SHIMB and follow the guided assessment to generate actionable insights and compelling reports for your stakeholders.</p>
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