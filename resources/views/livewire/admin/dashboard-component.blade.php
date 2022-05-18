<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-col space-y-6">
        <div class="grid grid-cols-3 gap-6">
            <div class="flex bg-white shadow col-span-1">
                <div class="bg-blue-600 p-4">
                    <i class='bx bxs-wallet-alt text-5xl text-white'></i>
                </div>

                <div class="flex flex-col space-y-1 p-2">
                    <span class="text-xl font-extrabold text-blue-600">Penerimaan Hari Ini</span>
                    <span class="text-xl font-semibold">Rp. 100.000</span>
                </div>
            </div>
            {{-- <div class="flex bg-white shadow col-span-1">
                <div class="bg-red-600 p-4">
                    <i class='bx bx-export text-5xl text-white'></i>
                </div>

                <div class="flex flex-col space-y-1 p-2">
                    <span class="text-sm">Pengeluaran Hari Ini</span>
                    <span class="text-xl font-semibold">Rp. 100.000</span>
                </div>
            </div> --}}
            <div class="flex bg-white shadow col-span-1">
                <div class="bg-green-600 p-4">
                    <i class='bx bxs-credit-card text-5xl text-white'></i>
                </div>

                <div class="flex flex-col space-y-1 p-2">
                    <span class="text-xl font-extrabold text-green-600">Total Penerimaan</span>
                    <span class="text-xl font-semibold">Rp. 100.000</span>
                </div>
            </div>
            <div class="flex bg-white shadow col-span-1">
                <div class="bg-yellow-600 p-4">
                    <i class='bx bxs-user-rectangle text-5xl text-white'></i>
                </div>

                <div class="flex flex-col space-y-1 p-2">
                    <span class="text-xl font-extrabold text-yellow-600">Siswa Aktif</span>
                    <span class="text-xl font-semibold">{{ $student_active }}</span>
                </div>
            </div>
        </div>

        <div class="shadow-lg rounded-lg overflow-hidden">
            <canvas class="p-10" id="chartBar"></canvas>
        </div>


    </div>
    @push('js')
        <!-- Required chart.js -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <!-- Chart bar -->
        <script>
            const labelsBarChart = [
                "January",
                "February",
                "March",
                "April",
                "May",
                "June",
            ];
            const dataBarChart = {
                labels: labelsBarChart,
                datasets: [{
                    label: "My First dataset",
                    backgroundColor: "hsl(252, 82.9%, 67.8%)",
                    borderColor: "hsl(252, 82.9%, 67.8%)",
                    data: [0, 10, 5, 2, 20, 30, 45],
                }, ],
            };

            const configBarChart = {
                type: "bar",
                data: dataBarChart,
                options: {},
            };
            var chartBar = new Chart(
                document.getElementById("chartBar"),
                configBarChart
            );
        </script>
    @endpush
</div>
