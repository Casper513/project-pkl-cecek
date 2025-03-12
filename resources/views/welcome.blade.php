<!-- resources/views/portfolio.blade.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio Saya</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
    <style>
        :root {
            --primary: #2563eb;
            --secondary: #4f46e5;
            --dark: #1e293b;
            --light: #f8fafc;
            --accent: #8b5cf6;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-color: var(--light);
            color: var(--dark);
            overflow-x: hidden;
        }

        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Header & Navbar Styles */
        header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            padding: 20px 0;
            z-index: 1000;
            transition: all 0.3s ease;
        }

        header.scrolled {
            background-color: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--primary);
            text-decoration: none;
        }

        .logo span {
            color: var(--accent);
        }

        .nav-links {
            display: flex;
            gap: 30px;
        }

        .nav-links a {
            color: var(--dark);
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
            position: relative;
        }

        .nav-links a:hover {
            color: var(--primary);
        }

        .nav-links a::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 2px;
            background-color: var(--primary);
            transition: width 0.3s ease;
        }

        .nav-links a:hover::after {
            width: 100%;
        }

        .hamburger {
            display: none;
            cursor: pointer;
        }

        /* Hero Section */
        .hero {
            height: 100vh;
            display: flex;
            align-items: center;
            position: relative;
            overflow: hidden;
        }

        .hero-content {
            width: 60%;
            z-index: 2;
        }

        .hero-image {
            position: absolute;
            right: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 40%;
            z-index: 1;
            opacity: 0;
            animation: fadeIn 1s ease forwards 0.5s;
        }

        .hero h1 {
            font-size: 3.5rem;
            margin-bottom: 20px;
            line-height: 1.2;
            opacity: 0;
            transform: translateY(20px);
            animation: fadeInUp 1s ease forwards;
        }

        .hero p {
            font-size: 1.2rem;
            margin-bottom: 30px;
            line-height: 1.6;
            opacity: 0;
            transform: translateY(20px);
            animation: fadeInUp 1s ease forwards 0.3s;
        }

        .hero-bg {
            position: absolute;
            top: -50%;
            right: -10%;
            width: 80%;
            height: 200%;
            background: linear-gradient(45deg, var(--primary), var(--accent));
            border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%;
            z-index: 0;
            animation: morphing 15s ease-in-out infinite;
        }

        @keyframes morphing {
            0% {
                border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%;
            }
            25% {
                border-radius: 50% 50% 30% 70% / 60% 40% 60% 40%;
            }
            50% {
                border-radius: 70% 30% 50% 50% / 40% 60% 40% 60%;
            }
            75% {
                border-radius: 40% 60% 70% 30% / 30% 70% 30% 70%;
            }
            100% {
                border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%;
            }
        }

        .btn {
            display: inline-block;
            padding: 12px 30px;
            background-color: var(--primary);
            color: white;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 500;
            letter-spacing: 1px;
            transition: all 0.3s ease;
            border: 2px solid var(--primary);
            opacity: 0;
            transform: translateY(20px);
            animation: fadeInUp 1s ease forwards 0.6s;
        }

        .btn:hover {
            background-color: transparent;
            color: var(--primary);
        }

        .btn-secondary {
            background-color: transparent;
            color: var(--primary);
            margin-left: 15px;
        }

        .btn-secondary:hover {
            background-color: var(--primary);
            color: white;
        }
        
        .scroll-down {
            position: absolute;
            bottom: 50px;
            left: 50%;
            transform: translateX(-50%);
            animation: bounce 2s infinite;
            color: var(--dark);
            font-size: 2rem;
            cursor: pointer;
            opacity: 0;
            animation: fadeIn 1s ease forwards 1s, bounce 2s infinite 1s;
        }

        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% {
                transform: translateY(0) translateX(-50%);
            }
            40% {
                transform: translateY(-20px) translateX(-50%);
            }
            60% {
                transform: translateY(-10px) translateX(-50%);
            }
        }

        /* About Section */
        .about {
            padding: 100px 0;
            position: relative;
        }

        .about-content {
            display: flex;
            gap: 50px;
            align-items: center;
        }

        .about-image {
            flex: 1;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 20px 30px rgba(0, 0, 0, 0.1);
            transform: translateY(50px);
            opacity: 0;
            transition: all 0.8s ease;
        }

        .about-image.visible {
            transform: translateY(0);
            opacity: 1;
        }

        .about-image img {
            width: 100%;
            height: auto;
            transition: transform 0.5s ease;
        }

        .about-image:hover img {
            transform: scale(1.05);
        }

        .about-text {
            flex: 1;
            transform: translateY(50px);
            opacity: 0;
            transition: all 0.8s ease 0.2s;
        }

        .about-text.visible {
            transform: translateY(0);
            opacity: 1;
        }

        .section-title {
            font-size: 2.5rem;
            margin-bottom: 20px;
            position: relative;
            display: inline-block;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 0;
            width: 100px;
            height: 3px;
            background: linear-gradient(to right, var(--primary), var(--accent));
        }

        .skills {
            margin-top: 30px;
        }

        .skills-title {
            font-size: 1.3rem;
            margin-bottom: 15px;
        }

        .skill-tags {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .skill-tag {
            padding: 8px 15px;
            background-color: rgba(79, 70, 229, 0.1);
            color: var(--primary);
            border-radius: 50px;
            font-size: 0.9rem;
            transition: all 0.3s ease;
        }

        .skill-tag:hover {
            background-color: var(--primary);
            color: white;
            transform: translateY(-5px);
        }

        /* Services Section */
        .services {
            padding: 100px 0;
            background-color: #f3f4f6;
        }

        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            margin-top: 50px;
        }

        .service-card {
            background-color: white;
            border-radius: 15px;
            padding: 40px 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
            text-align: center;
            transform: translateY(50px);
            opacity: 0;
        }

        .service-card.visible {
            transform: translateY(0);
            opacity: 1;
        }

        .service-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
        }

        .service-icon {
            font-size: 3rem;
            margin-bottom: 20px;
            color: var(--primary);
            transition: all 0.3s ease;
        }

        .service-card:hover .service-icon {
            transform: scale(1.2);
            color: var(--accent);
        }

        .service-title {
            font-size: 1.5rem;
            margin-bottom: 15px;
        }

        /* Portfolio Section */
        .portfolio {
            padding: 100px 0;
        }

        .portfolio-filters {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-bottom: 40px;
        }

        .portfolio-filter {
            padding: 8px 20px;
            background-color: transparent;
            border: 1px solid #e2e8f0;
            border-radius: 50px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .portfolio-filter.active, .portfolio-filter:hover {
            background-color: var(--primary);
            color: white;
            border-color: var(--primary);
        }

        .portfolio-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 30px;
        }

        .portfolio-item {
            border-radius: 15px;
            overflow: hidden;
            position: relative;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            transform: translateY(50px);
            opacity: 0;
        }

        .portfolio-item.visible {
            transform: translateY(0);
            opacity: 1;
        }

        .portfolio-item:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
        }

        .portfolio-image {
            width: 100%;
            height: 250px;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .portfolio-item:hover .portfolio-image {
            transform: scale(1.1);
        }

        .portfolio-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.8), transparent);
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            padding: 20px;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .portfolio-item:hover .portfolio-overlay {
            opacity: 1;
        }

        .portfolio-title {
            color: white;
            font-size: 1.3rem;
            margin-bottom: 5px;
        }

        .portfolio-category {
            color: rgba(255, 255, 255, 0.8);
            font-size: 0.9rem;
        }

        .portfolio-link {
            position: absolute;
            top: 20px;
            right: 20px;
            width: 40px;
            height: 40px;
            background-color: white;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            color: var(--primary);
            text-decoration: none;
            transform: translateY(20px);
            opacity: 0;
            transition: all 0.3s ease 0.1s;
        }

        .portfolio-item:hover .portfolio-link {
            transform: translateY(0);
            opacity: 1;
        }

        /* Testimonial Section */
        .testimonials {
            padding: 100px 0;
            background-color: #f3f4f6;
            position: relative;
            overflow: hidden;
        }

        .testimonial-shape {
            position: absolute;
            bottom: -10%;
            left: -5%;
            width: 300px;
            height: 300px;
            background-color: rgba(79, 70, 229, 0.1);
            border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%;
            animation: morphing 15s ease-in-out infinite;
            z-index: 0;
        }

        .testimonial-shape-2 {
            position: absolute;
            top: -10%;
            right: -5%;
            width: 300px;
            height: 300px;
            background-color: rgba(79, 70, 229, 0.1);
            border-radius: 50% 50% 30% 70% / 60% 40% 60% 40%;
            animation: morphing 15s ease-in-out infinite reverse;
            z-index: 0;
        }

        .testimonial-slider {
            position: relative;
            z-index: 1;
            overflow: hidden;
            padding: 20px 0;
        }

        .testimonial-track {
            display: flex;
            transition: transform 0.5s ease;
        }

        .testimonial-slide {
            min-width: 100%;
            padding: 0 15px;
            opacity: 0;
            transform: scale(0.9);
            transition: all 0.5s ease;
        }

        .testimonial-slide.active {
            opacity: 1;
            transform: scale(1);
        }

        .testimonial-card {
            background-color: white;
            border-radius: 15px;
            padding: 40px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            text-align: center;
            position: relative;
        }

        .testimonial-card::before {
            content: '\201C';
            font-size: 5rem;
            color: rgba(79, 70, 229, 0.1);
            position: absolute;
            top: 20px;
            left: 20px;
            font-family: serif;
        }

        .testimonial-image {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
            margin: 0 auto 20px;
            border: 5px solid rgba(79, 70, 229, 0.1);
        }

        .testimonial-text {
            font-style: italic;
            margin-bottom: 20px;
            line-height: 1.7;
        }

        .testimonial-name {
            font-weight: 600;
            font-size: 1.1rem;
        }

        .testimonial-position {
            color: var(--primary);
            font-size: 0.9rem;
        }

        .testimonial-dots {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 30px;
        }

        .testimonial-dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background-color: #e2e8f0;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .testimonial-dot.active {
            background-color: var(--primary);
            transform: scale(1.3);
        }

        /* Contact Section */
        .contact {
            padding: 100px 0;
        }

        .contact-content {
            display: flex;
            gap: 50px;
            margin-top: 50px;
        }

        .contact-info {
            flex: 1;
            transform: translateY(50px);
            opacity: 0;
            transition: all 0.8s ease;
        }

        .contact-info.visible {
            transform: translateY(0);
            opacity: 1;
        }

        .contact-info-item {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 25px;
        }

        .contact-icon {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background-color: rgba(79, 70, 229, 0.1);
            display: flex;
            justify-content: center;
            align-items: center;
            color: var(--primary);
            font-size: 1.2rem;
            flex-shrink: 0;
            transition: all 0.3s ease;
        }

        .contact-info-item:hover .contact-icon {
            background-color: var(--primary);
            color: white;
            transform: translateY(-5px);
        }

        .contact-text h4 {
            font-size: 1.1rem;
            margin-bottom: 5px;
        }

        .contact-text p {
            color: #64748b;
        }

        .contact-form {
            flex: 1;
            transform: translateY(50px);
            opacity: 0;
            transition: all 0.8s ease 0.2s;
        }

        .contact-form.visible {
            transform: translateY(0);
            opacity: 1;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-input {
            width: 100%;
            padding: 15px;
            border: 1px solid #e2e8f0;
            border-radius: 10px;
            transition: all 0.3s ease;
            font-size: 1rem;
        }

        .form-input:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.2);
            outline: none;
        }

        .form-input::placeholder {
            color: #94a3b8;
        }

        textarea.form-input {
            min-height: 150px;
            resize: vertical;
        }

        .submit-btn {
            padding: 12px 30px;
            background-color: var(--primary);
            color: white;
            border: none;
            border-radius: 50px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            letter-spacing: 1px;
            display: inline-block;
        }

        .submit-btn:hover {
            background-color: var(--accent);
            transform: translateY(-5px);
        }

        /* Footer */
        footer {
            background-color: var(--dark);
            color: white;
            padding: 80px 0 30px;
            position: relative;
            overflow: hidden;
        }

        .footer-shape {
            position: absolute;
            top: -30%;
            right: -10%;
            width: 500px;
            height: 500px;
            background: linear-gradient(45deg, var(--primary), var(--accent));
            opacity: 0.1;
            border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%;
            z-index: 0;
            animation: morphing 15s ease-in-out infinite;
        }

        .footer-content {
            display: flex;
            flex-wrap: wrap;
            gap: 50px;
            position: relative;
            z-index: 1;
        }

        .footer-logo-section {
            flex: 2;
            min-width: 250px;
        }

        .footer-logo {
            font-size: 1.8rem;
            font-weight: 700;
            color: white;
            text-decoration: none;
            margin-bottom: 20px;
            display: inline-block;
        }

        .footer-logo span {
            color: var(--accent);
        }

        .footer-description {
            margin-bottom: 20px;
            line-height: 1.7;
            color: #cbd5e1;
        }

        .social-links {
            display: flex;
            gap: 15px;
        }

        .social-link {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.1);
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .social-link:hover {
            background-color: var(--primary);
            transform: translateY(-5px);
        }

        .footer-links {
            flex: 1;
            min-width: 150px;
        }

        .footer-title {
            font-size: 1.3rem;
            margin-bottom: 20px;
            position: relative;
            display: inline-block;
        }

        .footer-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 0;
            width: 40px;
            height: 3px;
            background: linear-gradient(to right, var(--primary), var(--accent));
        }

        .footer-links ul {
            list-style: none;
        }

        .footer-links li {
            margin-bottom: 10px;
        }

        .footer-links a {
            color: #cbd5e1;
            text-decoration: none;
            transition: all 0.3s ease;
            display: inline-block;
        }

        .footer-links a:hover {
            color: var(--primary);
            transform: translateX(5px);
        }

        .footer-bottom {
            text-align: center;
            padding-top: 40px;
            margin-top: 40px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            position: relative;
            z-index: 1;
        }

        .copyright {
            color: #cbd5e1;
        }

        /* Back to Top Button */
        .back-to-top {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background-color: var(--primary);
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            text-decoration: none;
            font-size: 1.2rem;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
            z-index: 100;
        }

        .back-to-top.visible {
            opacity: 1;
            visibility: visible;
        }

        .back-to-top:hover {
            background-color: var(--accent);
            transform: translateY(-5px);
        }

        /* Animations */
        @keyframes fadeIn {
            0% {
                opacity: 0;
            }
            100% {
                opacity: 1;
            }
        }

        @keyframes fadeInUp {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Responsive Styles */
        @media (max-width: 992px) {
            .hero-content {
                width: 100%;
                text-align: center;
            }

            .hero-image {
                display: none;
            }

            .about-content {
                flex-direction: column;
            }

            .contact-content {
                flex-direction: column;
            }
        }

        @media (max-width: 768px) {
            .nav-links {
                position: fixed;
                top: 0;
                right: -100%;
                width: 70%;
                height: 100vh;
                background-color: white;
                flex-direction: column;
                padding: 80px 30px;
                transition: right 0.3s ease;
                box-shadow: -5px 0 15px rgba(0, 0, 0, 0.1);
            }

            .nav-links.active {
                right: 0;
            }

            .hamburger {
                display: block;
                font-size: 1.5rem;
                z-index: 1001;
            }

            .hero h1 {
                font-size: 2.5rem;
            }

            .services-grid {
                grid-template-columns: 1fr;
            }

            .portfolio-grid {
                grid-template-columns: 1fr;
            }

            .footer-content {
                flex-direction: column;
                gap: 30px;
            }
        }
    </style>
</head>
<body>
    <!-- Header & Navbar -->
    <header id="header">
        <div class="container">
            <nav>
                <a href="#" class="logo">Port<span>folio</span></a>
                <div class="nav-links" id="navLinks">
                    <a href="#home">Beranda</a>
                    <a href="#about">Tentang</a>
                    <a href="#services">Layanan</a>
                    <a href="#portfolio">Portfolio</a>
                    <a href="#contact">Kontak</a>
                </div>
                <div class="hamburger" id="hamburger">
                    <i class="fas fa-bars"></i>
                </div>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero" id="home">
        <div class="container">
            <div class="hero-content">
                <h1>Hai, Saya <span style="color: var(--primary);">{{ $name ?? 'Nama Anda' }}</span></h1>
                <p>{{ $tagline ?? 'Web Developer & Designer Profesional' }}</p>
                <a href="#portfolio" class="btn">Lihat Portfolio</a>
                <a href="#contact" class="btn btn-secondary">Hubungi Saya</a>
            </div>
            <div class="hero-bg"></div>
            <img src="/api/placeholder/500/500" alt="Hero Image" class="hero-image">
        </div>
        <a href="#about" class="scroll-down">
            <i class="fas fa-chevron-down"></i>
        </a>
    </section>

    <!-- About Section -->
    <section class="about" id="about">
        <div class="container">
            <div class="about-content">
                <div class="about-image">
                    <img src="/api/placeholder/600/600" alt="About Me">
                </div>
                <div class="about-text">
                    <h2 class="section-title">Tentang Saya</h2>
                    <p>{{ $about_desc ?? 'Saya adalah seorang web developer dan designer yang berpengalaman dengan lebih dari 5 tahun di industri ini. Saya memiliki keahlian dalam menciptakan pengalaman pengguna yang menarik dan intuitif melalui desain web yang inovatif. Saya percaya bahwa desain yang baik harus fungsional, estetis, dan mencerminkan identitas merek klien.' }}</p>
                    <div class="skills">
                        <h3 class="skills-title">Keahlian Saya</h3>
                        <div class="skill-tags">
                            <span class="skill-tag">Laravel</span>
                            <span class="skill-tag">PHP</span>
                            <span class="skill-tag">JavaScript</span>
                            <span class="skill-tag">HTML5</span>
                            <span class="skill-tag">CSS3</span>
                            <span class="skill-tag">React</span>
                            <span class="skill-tag">Vue.js</span>
                            <span class="skill-tag">MySQL</span>
                            <span class="skill-tag">UI/UX Design</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="services" id="services">
        <div class="container">
            <h2 class="section-title" style="text-align: center;">Layanan Saya</h2>
            <div class="services-grid">
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-code"></i>
                    </div>
                    <h3 class="service-title">Web Development</h3>
                    <p>Mengembangkan website responsif yang modern dengan performa tinggi menggunakan teknologi terbaru.</p>
                </div>
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-palette"></i>
                    </div>
                    <h3 class="service-title">Web Design</h3>
                    <p>Menciptakan desain website yang menarik dan user-friendly dengan fokus pada pengalaman pengguna.</p>
                </div>
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-mobile-alt"></i>
                    </div>
                    <h3 class="service-title">Responsive Design</h3>
                    <p>Memastikan website Anda terlihat sempurna di semua perangkat dari desktop hingga mobile.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Portfolio Section -->
    <section class="portfolio" id="portfolio">
        <div class="container">
            <h2 class="section-title" style="text-align: center;">Portfolio Terbaru</h2>
            <div class="portfolio-filters">
                <button class="portfolio-filter active" data-filter="all">Semua</button>
                <button class="portfolio-filter" data-filter="web">Web</button>
                <button class="portfolio-filter" data-filter="design">Design</button>
                <button class="portfolio-filter" data-filter="app">App</button>
            </div>
            <div class="portfolio-grid">
                <div class="portfolio-item" data-category="web">
                    <img src="/api/placeholder/600/400" alt="Portfolio Item" class="portfolio-image">
                    <div class="portfolio-overlay">
                        <h3 class="portfolio-title">Project E-Commerce</h3>
                        <p class="portfolio-category">Web Development</p>
                    </div>
                    <a href="#" class="portfolio-link">
                        <i class="fas fa-link"></i>
                    </a>
                </div>
                <div class="portfolio-item" data-category="design">
                    <img src="/api/placeholder/600/400" alt="Portfolio Item" class="portfolio-image">
                    <div class="portfolio-overlay">
                        <h3 class="portfolio-title">Branding Project</h3>
                        <p class="portfolio-category">UI/UX Design</p>
                    </div>
                    <a href="#" class="portfolio-link">
                        <i class="fas fa-link"></i>
                    </a>
                </div>
                <div class="portfolio-item" data-category="web">
                    <img src="/api/placeholder/600/400" alt="Portfolio Item" class="portfolio-image">
                    <div class="portfolio-overlay">
                        <h3 class="portfolio-title">Company Website</h3>
                        <p class="portfolio-category">Web Development</p>
                    </div>
                    <a href="#" class="portfolio-link">
                        <i class="fas fa-link"></i>
                    </a>
                </div>
                <div class="portfolio-item" data-category="app">
                    <img src="/api/placeholder/600/400" alt="Portfolio Item" class="portfolio-image">
                    <div class="portfolio-overlay">
                        <h3 class="portfolio-title">Mobile App</h3>
                        <p class="portfolio-category">App Development</p>
                    </div>
                    <a href="#" class="portfolio-link">
                        <i class="fas fa-link"></i>
                    </a>
                </div>
                <div class="portfolio-item" data-category="design">
                    <img src="/api/placeholder/600/400" alt="Portfolio Item" class="portfolio-image">
                    <div class="portfolio-overlay">
                        <h3 class="portfolio-title">Product Design</h3>
                        <p class="portfolio-category">UI/UX Design</p>
                    </div>
                    <a href="#" class="portfolio-link">
                        <i class="fas fa-link"></i>
                    </a>
                </div>
                <div class="portfolio-item" data-category="web">
                    <img src="/api/placeholder/600/400" alt="Portfolio Item" class="portfolio-image">
                    <div class="portfolio-overlay">
                        <h3 class="portfolio-title">Dashboard App</h3>
                        <p class="portfolio-category">Web Development</p>
                    </div>
                    <a href="#" class="portfolio-link">
                        <i class="fas fa-link"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonial Section -->
    <section class="testimonials" id="testimonials">
        <div class="testimonial-shape"></div>
        <div class="testimonial-shape-2"></div>
        <div class="container">
            <h2 class="section-title" style="text-align: center;">Apa Kata Klien</h2>
            <div class="testimonial-slider">
                <div class="testimonial-track">
                    <div class="testimonial-slide active">
                        <div class="testimonial-card">
                            <img src="/api/placeholder/150/150" alt="Testimonial" class="testimonial-image">
                            <p class="testimonial-text">"Saya sangat puas dengan hasil kerja yang diberikan. Website bisnis saya tidak hanya terlihat profesional tetapi juga sangat fungsional. Komunikasi yang lancar dan pengerjaan tepat waktu!"</p>
                            <h4 class="testimonial-name">Ahmad Satria</h4>
                            <p class="testimonial-position">CEO, Satria Digital</p>
                        </div>
                    </div>
                    <div class="testimonial-slide">
                        <div class="testimonial-card">
                            <img src="/api/placeholder/150/150" alt="Testimonial" class="testimonial-image">
                            <p class="testimonial-text">"Proses kerja yang sangat profesional. Mampu menghadirkan desain yang sesuai dengan visi perusahaan kami. Sangat direkomendasikan untuk kebutuhan web development Anda!"</p>
                            <h4 class="testimonial-name">Indah Pertiwi</h4>
                            <p class="testimonial-position">Marketing Director, Pertiwi Group</p>
                        </div>
                    </div>
                    <div class="testimonial-slide">
                        <div class="testimonial-card">
                            <img src="/api/placeholder/150/150" alt="Testimonial" class="testimonial-image">
                            <p class="testimonial-text">"Kemampuan teknis yang sangat baik dan pemahaman yang mendalam tentang kebutuhan bisnis kami. Website e-commerce yang dibuat telah meningkatkan penjualan kami secara signifikan."</p>
                            <h4 class="testimonial-name">Budi Santoso</h4>
                            <p class="testimonial-position">Owner, Santoso Shop</p>
                        </div>
                    </div>
                </div>
                <div class="testimonial-dots">
                    <div class="testimonial-dot active" data-index="0"></div>
                    <div class="testimonial-dot" data-index="1"></div>
                    <div class="testimonial-dot" data-index="2"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="contact" id="contact">
        <div class="container">
            <h2 class="section-title" style="text-align: center;">Hubungi Saya</h2>
            <div class="contact-content">
                <div class="contact-info">
                    <div class="contact-info-item">
                        <div class="contact-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="contact-text">
                            <h4>Lokasi</h4>
                            <p>{{ $location ?? 'Jakarta, Indonesia' }}</p>
                        </div>
                    </div>
                    <div class="contact-info-item">
                        <div class="contact-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="contact-text">
                            <h4>Email</h4>
                            <p>{{ $email ?? 'email@example.com' }}</p>
                        </div>
                    </div>
                    <div class="contact-info-item">
                        <div class="contact-icon">
                            <i class="fas fa-phone-alt"></i>
                        </div>
                        <div class="contact-text">
                            <h4>Telepon</h4>
                            <p>{{ $phone ?? '+62 812 3456 7890' }}</p>
                        </div>
                    </div>
                    <div class="contact-info-item">
                        <div class="contact-icon">
                            <i class="fas fa-globe"></i>
                        </div>
                        <div class="contact-text">
                            <h4>Website</h4>
                            <p>{{ $website ?? 'www.yourwebsite.com' }}</p>
                        </div>
                    </div>
                </div>
                <div class="contact-form">
                    <form action="#" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-input" name="name" placeholder="Nama Lengkap" required>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-input" name="email" placeholder="Alamat Email" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="subject" placeholder="Subjek" required>
                        </div>
                        <div class="form-group">
                            <textarea class="form-input" name="message" placeholder="Pesan Anda" required></textarea>
                        </div>
                        <button type="submit" class="submit-btn">Kirim Pesan</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="footer-shape"></div>
        <div class="container">
            <div class="footer-content">
                <div class="footer-logo-section">
                    <a href="#" class="footer-logo">Port<span>folio</span></a>
                    <p class="footer-description">{{ $footer_desc ?? 'Saya menyediakan solusi web development dan desain berkualitas tinggi untuk bisnis Anda. Mari kita wujudkan ide Anda menjadi kenyataan.' }}</p>
                    <div class="social-links">
                        <a href="#" class="social-link"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-github"></i></a>
                    </div>
                </div>
                <div class="footer-links">
                    <h3 class="footer-title">Menu</h3>
                    <ul>
                        <li><a href="#home">Beranda</a></li>
                        <li><a href="#about">Tentang</a></li>
                        <li><a href="#services">Layanan</a></li>
                        <li><a href="#portfolio">Portfolio</a></li>
                        <li><a href="#contact">Kontak</a></li>
                    </ul>
                </div>
                <div class="footer-links">
                    <h3 class="footer-title">Layanan</h3>
                    <ul>
                        <li><a href="#">Web Development</a></li>
                        <li><a href="#">Web Design</a></li>
                        <li><a href="#">Responsive Design</a></li>
                        <li><a href="#">UI/UX Design</a></li>
                        <li><a href="#">E-Commerce</a></li>
                    </ul>
                </div>
                <div class="footer-links">
                    <h3 class="footer-title">Legal</h3>
                    <ul>
                        <li><a href="#">Ketentuan Layanan</a></li>
                        <li><a href="#">Kebijakan Privasi</a></li>
                        <li><a href="#">Cookies</a></li>
                        <li><a href="#">FAQ</a></li>
                    </ul>
                </div>
            </div>
            <div class="footer-bottom">
                <p class="copyright">&copy; {{ date('Y') }} Portfolio. Dibuat dengan <i class="fas fa-heart" style="color: var(--primary);"></i> oleh {{ $name ?? 'Nama Anda' }}</p>
            </div>
        </div>
    </footer>

    <!-- Back to Top Button -->
    <a href="#" class="back-to-top" id="backToTop">
        <i class="fas fa-arrow-up"></i>
    </a>

    <!-- JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Toggle Mobile Menu
            const hamburger = document.getElementById('hamburger');
            const navLinks = document.getElementById('navLinks');
            
            hamburger.addEventListener('click', function() {
                navLinks.classList.toggle('active');
                if (navLinks.classList.contains('active')) {
                    this.innerHTML = '<i class="fas fa-times"></i>';
                } else {
                    this.innerHTML = '<i class="fas fa-bars"></i>';
                }
            });

            // Header Scroll Effect
            const header = document.getElementById('header');
            
            window.addEventListener('scroll', function() {
                if (window.scrollY > 50) {
                    header.classList.add('scrolled');
                } else {
                    header.classList.remove('scrolled');
                }
            });

            // Scroll to Section
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        window.scrollTo({
                            top: target.offsetTop - 80,
                            behavior: 'smooth'
                        });
                        
                        // Close mobile menu if open
                        if (navLinks.classList.contains('active')) {
                            navLinks.classList.remove('active');
                            hamburger.innerHTML = '<i class="fas fa-bars"></i>';
                        }
                    }
                });
            });

            // Back to Top Button
            const backToTop = document.getElementById('backToTop');
            
            window.addEventListener('scroll', function() {
                if (window.scrollY > 300) {
                    backToTop.classList.add('visible');
                } else {
                    backToTop.classList.remove('visible');
                }
            });

            backToTop.addEventListener('click', function(e) {
                e.preventDefault();
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });

            // Testimonial Slider
            const testimonialDots = document.querySelectorAll('.testimonial-dot');
            const testimonialSlides = document.querySelectorAll('.testimonial-slide');
            const testimonialTrack = document.querySelector('.testimonial-track');
            
            testimonialDots.forEach(dot => {
                dot.addEventListener('click', function() {
                    const index = this.getAttribute('data-index');
                    
                    // Update active dot
                    testimonialDots.forEach(d => d.classList.remove('active'));
                    this.classList.add('active');
                    
                    // Update active slide
                    testimonialSlides.forEach(slide => slide.classList.remove('active'));
                    testimonialSlides[index].classList.add('active');
                    
                    // Move the track
                    testimonialTrack.style.transform = `translateX(-${index * 100}%)`;
                });
            });

            // Auto slide testimonials
            let currentSlide = 0;
            const totalSlides = testimonialSlides.length;
            
            setInterval(() => {
                currentSlide = (currentSlide + 1) % totalSlides;
                
                // Update active dot
                testimonialDots.forEach(d => d.classList.remove('active'));
                testimonialDots[currentSlide].classList.add('active');
                
                // Update active slide
                testimonialSlides.forEach(slide => slide.classList.remove('active'));
                testimonialSlides[currentSlide].classList.add('active');
                
                // Move the track
                testimonialTrack.style.transform = `translateX(-${currentSlide * 100}%)`;
            }, 5000);

            // Portfolio Filters
            const portfolioFilters = document.querySelectorAll('.portfolio-filter');
            const portfolioItems = document.querySelectorAll('.portfolio-item');
            
            portfolioFilters.forEach(filter => {
                filter.addEventListener('click', function() {
                    // Update active filter
                    portfolioFilters.forEach(f => f.classList.remove('active'));
                    this.classList.add('active');
                    
                    const filterValue = this.getAttribute('data-filter');
                    
                    // Filter items
                    portfolioItems.forEach(item => {
                        if (filterValue === 'all' || item.getAttribute('data-category') === filterValue) {
                            item.style.display = 'block';
                        } else {
                            item.style.display = 'none';
                        }
                    });
                });
            });

            // Animation on Scroll
            const animateOnScroll = function() {
                const sections = [
                    document.querySelector('.about-image'),
                    document.querySelector('.about-text'),
                    ...document.querySelectorAll('.service-card'),
                    ...document.querySelectorAll('.portfolio-item'),
                    document.querySelector('.contact-info'),
                    document.querySelector('.contact-form')
                ];
                
                sections.forEach(section => {
                    if (section && section.getBoundingClientRect().top < window.innerHeight - 100) {
                        section.classList.add('visible');
                    }
                });
            };
            
            window.addEventListener('scroll', animateOnScroll);
            // Initial call to animate elements already in view
            animateOnScroll();
        });
    </script>
</body>
</html>