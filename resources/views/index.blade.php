@extends('main')

@section('content')
<!-- Contoh content dashboard -->
<link rel="stylesheet" href="{{ asset('node_modules/aos/dist/aos.css') }}">

<body>
    <div class="container d-flex flex-column align-items-center justify-content-center"
        style="min-height: 100vh; text-align: center; transform: translateY(-20px); animation: fadeIn 0.8s ease-in-out forwards;">
        <!-- Card Info -->
        <div class="row mt-4 justify-content-center"
            style="transform: translateY(-20px); animation: fadeOut 0.8s ease-in-out forwards;">
            <div class="col-md-10">
                <div class="row">
                    {{-- card jumlah mahasiswa --}}
                    <div class="col-md-6 mb-3" data-aos="fade-out" data-aos-duration="1000" data-aos-delay="400"
                        data-aos-easing="ease-in-out">
                        <div class="card text-white text-center p-4"
                            style="border-radius: 15px; font-weight: bold; font-size: 1.2rem; background: linear-gradient(to bottom right, #ffb3ab, #ff9966);">
                            <div class="d-flex align-items-center justify-content-center">
                                <i class="fas fa-user-graduate fa-2x mr-3"></i> <!-- Ikon -->
                                <div>
                                    <h5>Jumlah Mahasiswa</h5>
                                    <p class="display-4 count" data-target="{{ $mahasiswa }}">0</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- card jumlah Dosen --}}
                    <div class="col-md-6 mb-3" data-aos="fade-out" data-aos-duration="1200" data-aos-delay="600"
                        data-aos-easing="ease-in-out">
                        <div class="card text-white text-center p-4"
                            style="border-radius: 15px; font-weight: bold; font-size: 1.2rem; background: linear-gradient(to bottom right, #00b4d8, #00f5d4);">
                            <div class="d-flex align-items-center justify-content-center">
                                <i class="fas fa-chalkboard-teacher fa-2x mr-3"></i> <!-- Ikon -->
                                <div>
                                    <h5>Jumlah Dosen</h5>
                                    <p class="display-4 count" data-target="{{ $dosen }}">0</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="{{ asset('node_modules/aos/dist/aos.js') }}"></script>
        <script>
            window.addEventListener('load', function() {
                    const counters = document.querySelectorAll('.count');
                    counters.forEach(counter => {
                        let target = +counter.getAttribute('data-target');
                        let count = 0;
                        let increment = target / 50; // Durasi animasi

                        function updateCounter() {
                            count += increment;
                            if (count < target) {
                                counter.textContent = Math.ceil(count);
                                requestAnimationFrame(updateCounter);
                            } else {
                                counter.textContent = target;
                            }
                        }
                        updateCounter();
                    });
                });
        </script>
        <style>
            @keyframes fadeIn {
                from {
                    opacity: 0;
                    transform: translateY(-20px);
                }

                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            @keyframes fadeOut {
                from {
                    opacity: 0;
                    transform: translateY(-20px);
                }

                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }
        </style>
</body>
@endsection