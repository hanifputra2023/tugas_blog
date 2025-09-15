<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kategori Modern</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #4f8cff;
            --primary-dark: #2563eb;
            --secondary: #6dd5ed;
            --accent: #ff6b6b;
            --light: #f8fafc;
            --dark: #1e293b;
            --gray: #64748b;
            --light-gray: #e2e8f0;
            --card-shadow: 0 20px 40px rgba(79, 140, 255, 0.15);
            --hover-shadow: 0 25px 50px rgba(79, 140, 255, 0.25);
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%);
            font-family: 'Inter', sans-serif;
            color: var(--dark);
            line-height: 1.6;
            min-height: 100vh;
            padding: 20px;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
        }
        
        /* Header Styles */
        .category-header {
            background: linear-gradient(120deg, var(--primary) 0%, var(--secondary) 100%);
            border-radius: 24px;
            padding: 3.5rem 2.5rem;
            margin-bottom: 3rem;
            color: white;
            text-align: center;
            position: relative;
            overflow: hidden;
            box-shadow: var(--card-shadow);
        }
        
        .category-header::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
            transform: rotate(30deg);
        }
        
        .category-title {
            font-size: 3.2rem;
            font-weight: 800;
            margin-bottom: 1.2rem;
            position: relative;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        
        .category-meta {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 1.5rem;
            flex-wrap: wrap;
            margin-bottom: 1.5rem;
            position: relative;
        }
        
        .meta-badge {
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            padding: 0.7rem 1.4rem;
            border-radius: 16px;
            display: flex;
            align-items: center;
            gap: 0.7rem;
            font-size: 1.05rem;
            font-weight: 600;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }
        
        /* Description Card */
        .description-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 2rem;
            margin-bottom: 3rem;
            box-shadow: var(--card-shadow);
            border: 1px solid rgba(255, 255, 255, 0.7);
            position: relative;
            overflow: hidden;
        }
        
        .description-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 5px;
            height: 100%;
            background: linear-gradient(to bottom, var(--primary), var(--secondary));
        }
        
        .description-title {
            color: var(--primary-dark);
            font-weight: 700;
            font-size: 1.3rem;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 0.8rem;
        }
        
        .description-text {
            color: var(--gray);
            font-size: 1.1rem;
            line-height: 1.7;
            padding-left: 1.5rem;
            border-left: 2px dashed var(--light-gray);
            margin-left: 0.5rem;
        }
        
        /* Posts Grid */
        .posts-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(380px, 1fr));
            gap: 2.5rem;
            margin-bottom: 4rem;
        }
        
        .post-card {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            overflow: hidden;
            transition: all 0.3s ease;
            box-shadow: var(--card-shadow);
            border: 1px solid rgba(255, 255, 255, 0.8);
            position: relative;
        }
        
        .post-card:hover {
            transform: translateY(-8px);
            box-shadow: var(--hover-shadow);
        }
        
        .post-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 6px;
            background: linear-gradient(to right, var(--primary), var(--secondary));
        }
        
        .post-card-body {
            padding: 2rem;
        }
        
        .post-card-title {
            font-size: 1.4rem;
            font-weight: 700;
            margin-bottom: 1rem;
            color: var(--dark);
        }
        
        .post-card-title a {
            color: var(--primary-dark);
            text-decoration: none;
            transition: all 0.3s ease;
            display: block;
        }
        
        .post-card-title a:hover {
            color: var(--primary);
            transform: translateX(5px);
        }
        
        .post-card-text {
            color: var(--gray);
            line-height: 1.7;
            margin-bottom: 1.5rem;
            font-size: 1.05rem;
        }
        
        .post-meta {
            display: flex;
            align-items: center;
            gap: 1.2rem;
            font-size: 0.95rem;
            color: var(--gray);
            padding-top: 1.2rem;
            border-top: 1px solid var(--light-gray);
        }
        
        .meta-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 5rem 2rem;
            background: rgba(255, 255, 255, 0.95);
            border-radius: 24px;
            box-shadow: var(--card-shadow);
            margin: 2rem 0;
            border: 1px solid rgba(255, 255, 255, 0.8);
        }
        
        .empty-state-icon {
            font-size: 5rem;
            color: var(--primary);
            margin-bottom: 1.5rem;
            opacity: 0.8;
        }
        
        .empty-state h3 {
            font-size: 1.8rem;
            margin-bottom: 1rem;
            color: var(--dark);
        }
        
        .empty-state p {
            color: var(--gray);
            font-size: 1.1rem;
            max-width: 500px;
            margin: 0 auto 2rem;
        }
        
        /* Action Section */
        .action-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 1.5rem;
            padding: 2.5rem;
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            box-shadow: var(--card-shadow);
            border: 1px solid rgba(255, 255, 255, 0.8);
        }
        
        .btn-group {
            display: flex;
            gap: 1.2rem;
            flex-wrap: wrap;
        }
        
        .action-btn {
            padding: 1rem 2rem;
            border: none;
            border-radius: 16px;
            font-weight: 600;
            font-size: 1.05rem;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.7rem;
            box-shadow: 0 4px 12px rgba(79, 140, 255, 0.2);
        }
        
        .action-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(79, 140, 255, 0.3);
        }
        
        .btn-back {
            background: linear-gradient(90deg, var(--primary) 0%, var(--secondary) 100%);
            color: white;
        }
        
        .btn-back:hover {
            background: linear-gradient(90deg, var(--primary-dark) 0%, var(--primary) 100%);
            color: white;
        }
        
        .btn-edit {
            background: var(--light);
            color: var(--primary-dark);
        }
        
        .btn-edit:hover {
            background: #e2e8f0;
            color: var(--primary-dark);
        }
        
        .btn-delete {
            background: #fee2e2;
            color: #dc2626;
        }
        
        .btn-delete:hover {
            background: #fecaca;
            color: #b91c1c;
        }
        
        .btn-create {
            background: linear-gradient(90deg, var(--primary) 0%, var(--secondary) 100%);
            color: white;
        }
        
        .btn-create:hover {
            background: linear-gradient(90deg, var(--primary-dark) 0%, var(--primary) 100%);
            color: white;
        }
        
        /* Responsive Design */
        @media (max-width: 900px) {
            .category-title {
                font-size: 2.5rem;
            }
            
            .posts-grid {
                grid-template-columns: 1fr;
                gap: 2rem;
            }
            
            .action-section {
                flex-direction: column;
                align-items: stretch;
                text-align: center;
            }
            
            .btn-group {
                justify-content: center;
            }
        }
        
        @media (max-width: 600px) {
            .category-header {
                padding: 2.5rem 1.5rem;
            }
            
            .category-title {
                font-size: 2rem;
            }
            
            .category-meta {
                flex-direction: column;
                gap: 1rem;
            }
            
            .action-btn {
                width: 100%;
                justify-content: center;
            }
        }
        
        /* Animations */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .animate-fadeIn {
            animation: fadeIn 0.6s ease-out forwards;
        }
        
        /* Decorative Elements */
        .decorative-circle {
            position: absolute;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(255,255,255,0.2) 0%, transparent 70%);
        }
        
        .circle-1 {
            width: 200px;
            height: 200px;
            top: -100px;
            right: -100px;
        }
        
        .circle-2 {
            width: 150px;
            height: 150px;
            bottom: -75px;
            left: -75px;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header Section -->
        <header class="category-header animate-fadeIn">
            <div class="decorative-circle circle-1"></div>
            <div class="decorative-circle circle-2"></div>
            
            <h1 class="category-title">
                <i class="fas fa-tag"></i> Teknologi
            </h1>
            
            <div class="category-meta">
                <div class="meta-badge">
                    <i class="fas fa-newspaper"></i>
                    <span>12 Posts</span>
                </div>
                
                <div class="meta-badge">
                    <i class="fas fa-cog"></i>
                    <span>Kategori dapat diatur</span>
                </div>
            </div>
        </header>

        <!-- Description Card -->
        <div class="description-card animate-fadeIn" style="animation-delay: 0.2s;">
            <h3 class="description-title">
                <i class="fas fa-info-circle"></i>
                Deskripsi Kategori
            </h3>
            <p class="description-text">
                Kategori Teknologi membahas perkembangan terbaru dalam dunia teknologi, inovasi digital, gadget terbaru, 
                tutorial pemrograman, serta tren teknologi masa depan. Temukan artikel menarik seputar artificial intelligence, 
                blockchain, cloud computing, dan berbagai topik teknologi terkini.
            </p>
        </div>

        <!-- Posts Grid -->
        <div class="posts-grid">
            <!-- Post 1 -->
            <div class="post-card animate-fadeIn" style="animation-delay: 0.3s;">
                <div class="post-card-body">
                    <h3 class="post-card-title">
                        <a href="#">
                            <i class="fas fa-arrow-right"></i> 
                            Perkembangan Artificial Intelligence di Tahun 2023
                        </a>
                    </h3>
                    <p class="post-card-text">
                        Artificial Intelligence terus berkembang pesat. Simak tren terbaru AI dan bagaimana teknologi ini 
                        mengubah berbagai industri di dunia.
                    </p>
                    <div class="post-meta">
                        <div class="meta-item">
                            <i class="fas fa-user"></i>
                            <span>Budi Santoso</span>
                        </div>
                        <div class="meta-item">
                            <i class="fas fa-calendar-alt"></i>
                            <span>15 Agu 2023</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Post 2 -->
            <div class="post-card animate-fadeIn" style="animation-delay: 0.4s;">
                <div class="post-card-body">
                    <h3 class="post-card-title">
                        <a href="#">
                            <i class="fas fa-arrow-right"></i> 
                            Tutorial Laravel 10: Membuat API yang Efisien
                        </a>
                    </h3>
                    <p class="post-card-text">
                        Pelajari cara membuat API yang efisien dengan Laravel 10. Artikel ini membahas best practices 
                        dan tips untuk pengembangan API yang scalable.
                    </p>
                    <div class="post-meta">
                        <div class="meta-item">
                            <i class="fas fa-user"></i>
                            <span>Sari Wijaya</span>
                        </div>
                        <div class="meta-item">
                            <i class="fas fa-calendar-alt"></i>
                            <span>10 Agu 2023</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Post 3 -->
            <div class="post-card animate-fadeIn" style="animation-delay: 0.5s;">
                <div class="post-card-body">
                    <h3 class="post-card-title">
                        <a href="#">
                            <i class="fas fa-arrow-right"></i> 
                            Blockchain Beyond Cryptocurrency: Aplikasi di Dunia Nyata
                        </a>
                    </h3>
                    <p class="post-card-text">
                        Teknologi blockchain tidak hanya tentang cryptocurrency. Temukan bagaimana blockchain digunakan 
                        dalam supply chain, healthcare, dan berbagai industri lainnya.
                    </p>
                    <div class="post-meta">
                        <div class="meta-item">
                            <i class="fas fa-user"></i>
                            <span>Rizky Pratama</span>
                        </div>
                        <div class="meta-item">
                            <i class="fas fa-calendar-alt"></i>
                            <span>5 Agu 2023</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Action Section -->
        <div class="action-section animate-fadeIn" style="animation-delay: 0.6s;">
            <a href="#" class="action-btn btn-back">
                <i class="fas fa-arrow-left"></i>
                Kembali ke Daftar Kategori
            </a>
            
            <div class="btn-group">
                <a href="#" class="action-btn btn-edit">
                    <i class="fas fa-edit"></i>
                    Edit Kategori
                </a>
                
                <button class="action-btn btn-delete">
                    <i class="fas fa-trash"></i>
                    Hapus Kategori
                </button>
                
                <a href="#" class="action-btn btn-create">
                    <i class="fas fa-plus"></i>
                    Buat Post Baru
                </a>
            </div>
        </div>
    </div>

    <script>
        // Add simple animations when the page loads
        document.addEventListener('DOMContentLoaded', function() {
            const animatedElements = document.querySelectorAll('.animate-fadeIn');
            
            animatedElements.forEach(element => {
                element.style.opacity = '0';
            });
            
            setTimeout(() => {
                animatedElements.forEach(element => {
                    element.style.opacity = '1';
                });
            }, 100);
        });
    </script>
</body>
</html>