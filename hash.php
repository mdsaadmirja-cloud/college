<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>College Management System | Smart Performance Hub</title>
    <!-- Google Fonts & Font Awesome -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;14..32,400;14..32,600;14..32,700;14..32,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Chart.js for animated analytics demo -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(145deg, #f6f9fc 0%, #eef2f5 100%);
            color: #1a2c3e;
            overflow-x: hidden;
            scroll-behavior: smooth;
        }

        /* animated gradient background orb + floating elements */
        .bg-orb {
            position: fixed;
            width: 80vw;
            height: 80vw;
            background: radial-gradient(circle, rgba(79, 172, 254, 0.15) 0%, rgba(0, 242, 254, 0.05) 100%);
            border-radius: 50%;
            top: -20vh;
            right: -20vw;
            z-index: 0;
            pointer-events: none;
            filter: blur(70px);
            animation: floatOrb 24s infinite alternate ease-in-out;
        }

        .bg-orb2 {
            position: fixed;
            width: 60vw;
            height: 60vw;
            background: radial-gradient(circle, rgba(114, 46, 209, 0.12), rgba(46, 125, 209, 0.02));
            bottom: -30vh;
            left: -20vw;
            border-radius: 50%;
            filter: blur(90px);
            pointer-events: none;
            animation: floatOrb2 30s infinite alternate;
            z-index: 0;
        }

        @keyframes floatOrb {
            0% { transform: translate(0, 0) scale(1); }
            100% { transform: translate(5%, 5%) scale(1.1); }
        }
        @keyframes floatOrb2 {
            0% { transform: translate(0, 0) rotate(0deg); }
            100% { transform: translate(-4%, 6%) rotate(3deg); }
        }

        /* main container */
        .main-container {
            position: relative;
            z-index: 2;
            max-width: 1400px;
            margin: 0 auto;
            padding: 2rem 1.8rem 4rem;
        }

        /* glass-morphism cards & interactive effects */
        .glass-card, .feature-card, .tech-badge, .compare-panel, .dashboard-card, .insight-card, .footer-card {
            background: rgba(255, 255, 255, 0.75);
            backdrop-filter: blur(12px);
            border-radius: 2rem;
            box-shadow: 0 12px 32px rgba(0, 0, 0, 0.05), 0 2px 6px rgba(0, 0, 0, 0.02);
            transition: all 0.3s cubic-bezier(0.2, 0.9, 0.4, 1.1);
            border: 1px solid rgba(255,255,255,0.6);
        }

        .glass-card:hover, .feature-card:hover, .dashboard-card:hover {
            transform: translateY(-6px) scale(1.01);
            box-shadow: 0 28px 40px rgba(0, 0, 0, 0.12);
            background: rgba(255, 255, 255, 0.85);
            border-color: rgba(79, 172, 254, 0.4);
        }

        /* title animations */
        .hero-title {
            font-size: 3.8rem;
            font-weight: 800;
            background: linear-gradient(135deg, #1e3c72, #2b7a8a, #4facfe);
            background-size: 200% auto;
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            animation: shine 5s linear infinite, floatText 2.5s ease-out;
        }

        @keyframes shine {
            0% { background-position: 0% 50%; }
            100% { background-position: 200% 50%; }
        }

        @keyframes floatText {
            0% { opacity: 0; transform: translateY(35px); }
            100% { opacity: 1; transform: translateY(0); }
        }

        .subhead {
            animation: fadeSlideUp 0.8s ease-out 0.2s both;
        }

        @keyframes fadeSlideUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* grid layout */
        .grid-2, .grid-3, .grid-features {
            display: grid;
            gap: 1.8rem;
        }

        .grid-2 { grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); }
        .grid-3 { grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); }
        .grid-features { grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); }

        /* comparison table */
        .compare-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 1.5rem;
            justify-content: center;
        }
        .compare-panel {
            flex: 1;
            min-width: 220px;
            padding: 1.8rem;
            background: rgba(255,255,240,0.7);
        }
        .vs-badge {
            background: linear-gradient(145deg, #ff9966, #ff5e62);
            padding: 0.5rem 1.2rem;
            border-radius: 60px;
            color: white;
            font-weight: bold;
            display: inline-block;
        }

        /* tech badges */
        .tech-badge {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: white;
            padding: 0.5rem 1.4rem;
            border-radius: 100px;
            font-weight: 600;
            transition: all 0.2s;
        }
        .tech-badge i {
            font-size: 1.3rem;
            color: #2b7a8a;
        }

        /* system architecture */
        .arch-flow {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 2rem;
            margin-top: 1.5rem;
        }
        .arch-node {
            background: rgba(255,255,245,0.85);
            backdrop-filter: blur(4px);
            padding: 1rem 2rem;
            border-radius: 3rem;
            font-weight: 700;
            font-size: 1.2rem;
            box-shadow: 0 8px 20px rgba(0,0,0,0.05);
            transition: transform 0.2s;
        }
        .arch-node i { margin-right: 8px; color: #2c7da0; }

        /* performance matrix mock styling */
        .matrix-row {
            display: flex;
            justify-content: space-between;
            background: rgba(0,0,0,0.02);
            padding: 0.6rem;
            border-radius: 1rem;
            margin: 8px 0;
        }

        /* chart container */
        .chart-container canvas {
            max-height: 200px;
            width: 100%;
        }

        /* animated button effect */
        .btn-glow {
            background: linear-gradient(95deg, #1f6e8c, #2e8b9f);
            border: none;
            color: white;
            padding: 0.6rem 1.4rem;
            border-radius: 40px;
            font-weight: 500;
            transition: all 0.3s;
            box-shadow: 0 5px 12px rgba(0,0,0,0.1);
        }
        .btn-glow:hover {
            transform: scale(1.03);
            box-shadow: 0 12px 20px rgba(0,0,0,0.2);
            background: linear-gradient(95deg, #0f5b74, #1f7c8c);
        }

        /* stats roll */
        .stat-number {
            font-size: 2rem;
            font-weight: 800;
            background: linear-gradient(145deg, #005f73, #0a9396);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        footer {
            text-align: center;
            margin-top: 3rem;
        }

        hr {
            margin: 2rem 0;
            border: 0;
            height: 2px;
            background: radial-gradient(circle, rgba(79,172,254,0.5), transparent);
        }

        @media (max-width: 780px) {
            .hero-title { font-size: 2.4rem; }
            .main-container { padding: 1rem; }
        }
    </style>
</head>
<body>
<div class="bg-orb"></div>
<div class="bg-orb2"></div>

<div class="main-container">
    <!-- Hero section -->
    <div class="glass-card" style="padding: 2rem 2rem; text-align: center; margin-bottom: 2.5rem; background: rgba(255,255,250,0.8);">
        <div class="hero-title">College Management System</div>
        <div class="hero-title" style="font-size: 1.8rem; background: none; -webkit-background-clip: unset; background-clip: unset; color: #2c7da0;">User Management Module & Student Performance Tracking</div>
        <div class="subhead" style="margin-top: 1.2rem; display: flex; justify-content: center; gap: 1rem; flex-wrap: wrap;">
            <span><i class="fas fa-user-graduate"></i> Presented by: Mohammad Saad Mirjanavar</span>
            <span><i class="fas fa-id-card"></i> UUCMS: U02AT23S0021</span>
            <span><i class="fas fa-chalkboard-user"></i> Guide: Prof. Shafi Shaikh</span>
        </div>
        <div style="margin-top: 0.6rem;"><i class="fas fa-building"></i> BCA – 6th Semester | Nehru BBA & BCA College, Hubli | AY 2026</div>
        <div style="margin-top: 1rem;"><span class="btn-glow" style="display: inline-block; cursor: default;"><i class="fas fa-chart-line"></i> AI-powered · Smart Analytics</span></div>
    </div>

    <!-- Intro + objectives + problem statement (grid 3) -->
    <div class="grid-3" style="margin-bottom: 2.5rem;">
        <div class="glass-card" style="padding: 1.6rem;"><i class="fas fa-globe" style="font-size: 2rem; color: #2b7a8a;"></i><h3 style="margin: 0.8rem 0 0.5rem;">Introduction</h3><p>Web-based academic management system with role-based access for Admin, Faculty, Students. Attendance, marks tracking, performance analytics & secure centralized database.</p></div>
        <div class="glass-card" style="padding: 1.6rem;"><i class="fas fa-bullseye" style="font-size: 2rem; color: #2b7a8a;"></i><h3 style="margin: 0.8rem 0 0.5rem;">Objectives</h3><ul style="margin-left: 1.2rem;"><li>✔ Reduce paperwork</li><li>✔ Improve accuracy</li><li>✔ Secure user management</li><li>✔ Track academic performance</li><li>✔ Centralized data access</li></ul></div>
        <div class="glass-card" style="padding: 1.6rem;"><i class="fas fa-exclamation-triangle" style="font-size: 2rem; color: #e67e22;"></i><h3 style="margin: 0.8rem 0 0.5rem;">Problem Statement</h3><p>Manual record management is time-consuming, higher human errors, difficult performance tracking, lack of centralized access — need for automation.</p></div>
    </div>

    <!-- Existing vs Proposed System : animated comparison -->
    <div class="glass-card" style="padding: 1.8rem; margin-bottom: 2rem;">
        <h2 style="display: flex; align-items: center; gap: 12px;"><i class="fas fa-code-branch"></i> Existing vs Proposed System <span class="vs-badge" style="font-size: 0.8rem; margin-left: auto;">⚡ Evolution</span></h2>
        <div class="compare-grid" style="margin-top: 1.5rem;">
            <div class="compare-panel"><i class="fas fa-database" style="font-size: 2rem; opacity: 0.7;"></i><h3>Manual / Existing</h3><ul><li>📄 Paper-based</li><li>🐢 Slow processing</li><li>⚠️ Error-prone records</li><li>📉 No smart analytics</li></ul></div>
            <div class="compare-panel"><i class="fas fa-arrow-right fa-beat-fade" style="font-size: 1.6rem; align-self: center; margin: auto 0;"></i></div>
            <div class="compare-panel" style="background: linear-gradient(120deg, #e0f3fa, #ffffff);"><i class="fas fa-cloud-upload-alt" style="font-size: 2rem; color: #2c7da0;"></i><h3>Automated / Proposed</h3><ul><li>💻 Fully Digital</li><li>⚡ Fast & real-time</li><li>✅ High accuracy</li><li>📊 AI-driven analytics & insights</li></ul></div>
        </div>
    </div>

    <!-- Key Features (moving icons + hover shine) -->
    <div style="margin: 2rem 0 1rem;"><h2><i class="fas fa-star-of-life"></i> Key Features</h2></div>
    <div class="grid-features" style="margin-bottom: 2rem;">
        <div class="feature-card" style="padding: 1.5rem; text-align: center;"><i class="fas fa-fingerprint" style="font-size: 2.5rem; color: #1f6e8c;"></i><h3>Role-based Login</h3><p>Admin · Faculty · Students</p></div>
        <div class="feature-card" style="padding: 1.5rem; text-align: center;"><i class="fas fa-calendar-check" style="font-size: 2.5rem; color: #1f6e8c;"></i><h3>Attendance Management</h3><p>Real-time tracking & reports</p></div>
        <div class="feature-card" style="padding: 1.5rem; text-align: center;"><i class="fas fa-chart-simple" style="font-size: 2.5rem; color: #1f6e8c;"></i><h3>Performance Analytics</h3><p>Subject comparison, GPA trends</p></div>
        <div class="feature-card" style="padding: 1.5rem; text-align: center;"><i class="fas fa-microchip" style="font-size: 2.5rem; color: #1f6e8c;"></i><h3>AI Insights</h3><p>Risk level analysis · smart alerts</p></div>
        <div class="feature-card" style="padding: 1.5rem; text-align: center;"><i class="fas fa-file-pdf" style="font-size: 2.5rem; color: #1f6e8c;"></i><h3>PDF Report Export</h3><p>One-click performance reports</p></div>
        <div class="feature-card" style="padding: 1.5rem; text-align: center;"><i class="fas fa-tachometer-alt" style="font-size: 2.5rem; color: #1f6e8c;"></i><h3>Dashboard Monitoring</h3><p>Centralized live insights</p></div>
    </div>

    <!-- Technologies + System Architecture (Two column) -->
    <div class="grid-2" style="margin-bottom: 2rem;">
        <div class="glass-card" style="padding: 1.6rem;">
            <h3><i class="fas fa-code"></i> Technologies Used</h3>
            <div style="display: flex; flex-wrap: wrap; gap: 12px; margin-top: 1rem;">
                <span class="tech-badge"><i class="fab fa-php"></i> PHP</span>
                <span class="tech-badge"><i class="fas fa-database"></i> MySQL</span>
                <span class="tech-badge"><i class="fab fa-bootstrap"></i> Bootstrap</span>
                <span class="tech-badge"><i class="fab fa-html5"></i> HTML/CSS/JS</span>
                <span class="tech-badge"><i class="fas fa-server"></i> WAMP Server</span>
            </div>
            <div style="margin-top: 1.8rem;"><i class="fas fa-shield-alt"></i> Secure, scalable, fast processing</div>
        </div>
        <div class="glass-card" style="padding: 1.6rem;">
            <h3><i class="fas fa-project-diagram"></i> System Architecture / DFD</h3>
            <div class="arch-flow">
                <div class="arch-node"><i class="fas fa-user-shield"></i> Admin</div>
                <i class="fas fa-arrow-right"></i>
                <div class="arch-node"><i class="fas fa-chalkboard-user"></i> Faculty</div>
                <i class="fas fa-arrow-right"></i>
                <div class="arch-node"><i class="fas fa-user-graduate"></i> Students</div>
            </div>
            <p style="margin-top: 1rem;"><i class="fas fa-database"></i> Centralized DB → Role-based workflow, attendance & marks processing, analytics engine</p>
        </div>
    </div>

    <!-- Admin Dashboard & Faculty Performance Tracking (special moving chart) -->
    <div class="grid-2" style="margin-bottom: 2rem;">
        <div class="dashboard-card glass-card" style="padding: 1.6rem;">
            <h3><i class="fas fa-chalkboard"></i> Admin Dashboard</h3>
            <ul style="margin: 1rem 0;">
                <li>📊 Centralized performance monitoring</li>
                <li>📈 Attendance analytics & semester comparison</li>
                <li>🎯 Performance reports for all cohorts</li>
                <li>📅 Risk level overview / AI flags</li>
            </ul>
            <div class="chart-container">
                <canvas id="semesterChart" width="400" height="180" style="max-width:100%; height:auto;"></canvas>
                <p class="stat-number" style="font-size: 0.8rem; margin-top: 4px;"><i class="fas fa-chart-line"></i> Semester comparison (Avg. Performance)</p>
            </div>
        </div>
        <div class="dashboard-card glass-card" style="padding: 1.6rem;">
            <h3><i class="fas fa-chalkboard-user"></i> Faculty & Student Performance Tracking</h3>
            <div><i class="fas fa-balance-scale"></i> <strong>Subject comparison</strong> · Attendance summary · Risk level analysis</div>
            <div class="matrix-row" style="margin-top: 12px;"><span>📖 Mathematics</span><span>Attendance: 92%</span><span style="color:#2c7da0;">Grade: A</span><span class="stat-number" style="font-size:1rem;">Low Risk</span></div>
            <div class="matrix-row"><span>⚛️ Physics</span><span>Attendance: 78%</span><span style="color:#e67e22;">Grade: B</span><span style="color:#e67e22;">⚠️ Medium Risk</span></div>
            <div class="matrix-row"><span>💻 Programming</span><span>Attendance: 96%</span><span style="color:#2c7da0;">Grade: A+</span><span class="stat-number" style="font-size:1rem;">Stable</span></div>
            <div class="insight-card" style="background: #eef2fa; border-radius: 1rem; padding: 0.8rem; margin-top: 1rem;"><i class="fas fa-robot"></i> <strong>AI Performance Insights</strong> <span style="float:right;"><i class="fas fa-microchip"></i> Smart</span><br>✨ 3 students need intervention • Predictive analytics active • Performance matrix updated weekly</div>
            <p style="margin-top: 12px;"><i class="fas fa-chart-pie"></i> Risk level matrix & realtime insights empower faculty</p>
        </div>
    </div>

    <!-- Merits & Future Enhancements + extra AI prediction  -->
    <div class="glass-card" style="padding: 1.8rem; margin-bottom: 2rem;">
        <div class="grid-2" style="gap: 1.8rem;">
            <div><i class="fas fa-medal" style="font-size: 2rem;"></i><h3>Merits</h3><ul><li>⚡ Fast & Secure academic management</li><li>📊 Improved efficiency & analytics</li><li>🛡️ Role-based data protection</li><li>📑 Paperless eco-friendly system</li></ul></div>
            <div><i class="fas fa-rocket" style="font-size: 2rem;"></i><h3>Future Enhancements <span style="font-size:0.8rem;"><i class="fas fa-cloud-upload-alt"></i></span></h3><ul><li>☁️ Cloud integration (multi-campus)</li><li>📱 Mobile application support (iOS/Android)</li><li>🧠 AI-based prediction of student success</li><li>🔔 Smart notifications & chatbot assistant</li></ul></div>
        </div>
        <hr>
        <div style="text-align: center; font-style: italic;"><i class="fas fa-chart-line"></i> "Transforms manual management into digital excellence — AI analytics, real-time dashboards"</div>
    </div>

    <!-- Conclusion + Thank you moving particles (simple) -->
    <div class="footer-card glass-card" style="padding: 2rem; text-align: center; backdrop-filter: blur(8px);">
        <h2><i class="fas fa-check-circle"></i> Conclusion</h2>
        <p style="max-width: 700px; margin: 1rem auto;">College Management System revolutionizes academic administration by offering a secure, scalable digital ecosystem. Performance tracking, AI insights, and centralized data empower institutes to reduce errors and boost efficiency.</p>
        <div style="font-size: 1.8rem; margin: 20px 0 10px;"><i class="fas fa-heart beat" style="color: #ff6b6b;"></i> Thank You!</div>
        <div>© 2026 • Mohammad Saad Mirjanavar | Nehru BBA & BCA College, Hubli</div>
        <div class="subhead" style="margin-top: 10px;"><i class="fas fa-graduation-cap"></i> Transforming education with smart technology</div>
    </div>
</div>

<script>
    // Animated semester comparison chart (Admin Dashboard)
    const ctx = document.getElementById('semesterChart').getContext('2d');
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Sem 1', 'Sem 2', 'Sem 3', 'Sem 4', 'Sem 5', 'Sem 6'],
            datasets: [
                {
                    label: 'Average Attendance %',
                    data: [84, 87, 89, 91, 88, 93],
                    borderColor: '#2c7da0',
                    backgroundColor: 'rgba(44, 125, 160, 0.1)',
                    fill: true,
                    tension: 0.3,
                    pointBackgroundColor: '#1f6e8c',
                    pointBorderColor: '#fff',
                    pointRadius: 5,
                    pointHoverRadius: 7,
                },
                {
                    label: 'Performance Score (Marks)',
                    data: [72, 75, 78, 82, 84, 88],
                    borderColor: '#e9c46a',
                    backgroundColor: 'rgba(233, 196, 106, 0.05)',
                    borderDash: [5, 5],
                    tension: 0.3,
                    pointBackgroundColor: '#f4a261',
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: true,
            plugins: {
                legend: { position: 'top', labels: { font: { size: 10 } } },
                tooltip: { mode: 'index', intersect: false }
            },
            scales: {
                y: { beginAtZero: false, min: 60, grid: { color: 'rgba(0,0,0,0.05)' } }
            }
        }
    });

    // additional hover animation for tech cards and interactive insight
    const cards = document.querySelectorAll('.feature-card, .dashboard-card, .compare-panel');
    cards.forEach(card => {
        card.addEventListener('mousemove', (e) => {
            const rect = card.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;
            card.style.setProperty('--x', `${x}px`);
            card.style.setProperty('--y', `${y}px`);
        });
        card.addEventListener('mouseleave', () => {
            card.style.transform = '';
        });
    });

    // floating animation on scroll
    const revealElements = document.querySelectorAll('.glass-card, .feature-card, .grid-2, .grid-3');
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0px)';
                entry.target.style.transition = 'all 0.6s cubic-bezier(0.2, 0.9, 0.4, 1.1)';
            }
        });
    }, { threshold: 0.05, rootMargin: '0px 0px -20px 0px' });
    revealElements.forEach(el => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(18px)';
        observer.observe(el);
    });

    // small heartbeat animation for thank you icon
    const heartIcon = document.querySelector('.fa-heart');
    if(heartIcon) {
        setInterval(() => {
            heartIcon.style.transform = 'scale(1.15)';
            setTimeout(() => { heartIcon.style.transform = 'scale(1)'; }, 300);
        }, 1300);
    }

    // additional subtle "move" effect - background gradient shift on mousemove
    document.body.addEventListener('mousemove', (e) => {
        const x = e.clientX / window.innerWidth;
        const y = e.clientY / window.innerHeight;
        const orb = document.querySelector('.bg-orb');
        const orb2 = document.querySelector('.bg-orb2');
        if(orb && orb2) {
            orb.style.transform = `translate(${x * 12}px, ${y * 8}px) scale(1.05)`;
            orb2.style.transform = `translate(${-x * 8}px, ${-y * 12}px) scale(1.02)`;
        }
    });
</script>

<style>
    /* Additional micro-interactions */
    .fa-arrow-right {
        animation: subtlePulse 1.2s infinite;
    }
    @keyframes subtlePulse {
        0% { opacity: 0.5; transform: translateX(0);}
        100% { opacity: 1; transform: translateX(4px);}
    }
    .fa-beat-fade {
        animation: beatFade 1.6s infinite;
    }
    @keyframes beatFade {
        0% { opacity: 0.3; transform: scale(0.95);}
        50% { opacity: 1; transform: scale(1.07);}
        100% { opacity: 0.3; transform: scale(0.95);}
    }
    .matrix-row {
        transition: all 0.2s;
        border-radius: 16px;
    }
    .matrix-row:hover {
        background: rgba(47, 128, 165, 0.1);
        transform: translateX(6px);
    }
    .glass-card, .feature-card {
        transition: transform 0.25s, box-shadow 0.35s;
    }
    .tech-badge:hover {
        transform: scale(1.04) translateY(-2px);
        background: white;
        box-shadow: 0 12px 18px -8px rgba(0,0,0,0.1);
        border-color: #4facfe;
    }
</style>
</body>
</html>