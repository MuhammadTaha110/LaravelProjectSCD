@extends('layout')

@section('title', 'Home Page')

@section('content')
<main class="container">
    <section class="top row">
        <div class='col inner-container'>
            <h1>Manage Your Tasks!</h1>
            <p>Designed to streamline productivity by helping users organize, prioritize, and track tasks all in one place.</p>
            <img src="{{ asset('assets/images/Character1.png') }}" alt="">
        </div>
    </section>

    <section class="below row">
        <div class="inner-container create-task">
            <a href="{{ route('tasks.create') }}" class="text-decoration-none text-dark">
                <h4>Create Tasks</h4>
                <img src="{{ asset('assets/images/tasks3.png') }}" alt="">
            </a>
        </div>
        <div class="inner-container view-task">
            <a href="{{ route('tasks.index') }}" class="text-decoration-none text-dark">
                <h4>View Tasks</h4>
                <img src="{{ asset('assets/images/tasks1.png') }}" alt="">
            </a>
        </div>
    </section>

 
<!-- Features Section -->
<section class="features my-5">
    <h2 class="text-center mb-4">Our Features</h2>
    <div class="container">
        <div class="row desc">
            <!-- Create Task Feature -->
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                <div class="text-center">
                    <i class="fas fa-plus-circle fa-3x text-blue mb-2"></i>
                    <h5>Create Task</h5>
                    <p>Easily create and customize tasks to suit your workflow.</p>
                </div>
            </div>
            
            <!-- View Task Feature -->
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                <div class="text-center">
                    <i class="fas fa-eye fa-3x mb-2 text-green"></i>
                    <h5>View Task</h5>
                    <p>Effortlessly view all your tasks at a glance and stay organized.</p>
                </div>
            </div>
            
            <!-- Assign Task Feature -->
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                <div class="text-center">
                    <i class="fas fa-user-check fa-3x text-warning mb-2"></i>
                    <h5>Assign Task</h5>
                    <p>Delegate tasks easily to team members.</p>
                </div>
            </div>
            
            <!-- Track Assigned Task Feature -->
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                <div class="text-center">
                    <i class="fas fa-tasks fa-3x text-info mb-2"></i>
                    <h5>Track Assigned Task</h5>
                    <p>Monitor progress on assigned tasks of team members.</p>
                </div>
            </div>
        </div>
    </div>
</section>





    <!-- Contact Section -->
    <section class="contact row my-5">
        <div class="col text-center">
            <h2>Contact Us</h2>
            <p>If you have any questions or feedback, feel free to reach out to us!</p>
            <form action="" method="POST" class="contact-form">
                @csrf
                <div class="mb-3">
                    <input type="text" name="name" class="form-control" placeholder="Your Name" required>
                </div>
                <div class="mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Your Email" required>
                </div>
                <div class="mb-3">
                    <textarea name="message" class="form-control" rows="4" placeholder="Your Message" required></textarea>
                </div>
                <button type="submit" class="btn submit-btn">Send Message</button>
            </form>
        </div>
    </section>

    <!-- Carousel -->
    <div class="container h-100">
        <div class="row align-items-center h-100">
            <div class="container rounded">
                <h2 class="text-center">TRUSTED BY</h2>
                <div class="slider">
                    <div class="logos">
                        <img src="https://brainblitzbymtahatalib.netlify.app/imgs/logo.png" width='100px' alt="">
                        <img src="https://eboxelectric.com/media/logo/stores/6/EBOX_logo_NEW.png" width='120px' alt="">
                        <img src="https://jdjustdesigner.com/wp-content/uploads/2023/08/cropped-Untitled-design-59-155x74.png" width='120px' alt="">
                        <img src="https://aimastores.com/wp-content/uploads/2024/03/cropped-Final-file-02-01-scaled-1-2048x1472.jpg" width='100px' alt="">
                        <img src="https://wicjewellers.com/wp-content/uploads/2024/09/cropped-IMG-20240908-WA0086-removebg-1.png" width='140px' style='margin-top: 20px' alt="">
                        <img src="https://kolonimpression.com/wp-content/uploads/2024/10/kolon-logo-png-65x82.png" width='50px' alt="">
                        <img src="https://morkscents.com/wp-content/uploads/2024/10/logo.png" width='100px' alt="">
                    </div>
                    <div class="logos">
                        <img src="https://brainblitzbymtahatalib.netlify.app/imgs/logo.png" width='100px' alt="">
                        <img src="https://eboxelectric.com/media/logo/stores/6/EBOX_logo_NEW.png" width='120px' alt="">
                        <img src="https://jdjustdesigner.com/wp-content/uploads/2023/08/cropped-Untitled-design-59-155x74.png" width='120px' alt="">
                        <img src="https://aimastores.com/wp-content/uploads/2024/03/cropped-Final-file-02-01-scaled-1-2048x1472.jpg" width='100px' alt="">
                        <img src="https://wicjewellers.com/wp-content/uploads/2024/09/cropped-IMG-20240908-WA0086-removebg-1.png" width='140px' style='margin-top: 20px' alt="">
                        <img src="https://kolonimpression.com/wp-content/uploads/2024/10/kolon-logo-png-65x82.png" width='50px' alt="">
                        <img src="https://morkscents.com/wp-content/uploads/2024/10/logo.png" width='100px' alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>
@endsection
