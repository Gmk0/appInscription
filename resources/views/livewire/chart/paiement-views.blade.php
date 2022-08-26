<div>

    <div class="container mx-auto space-y-4 p-4 sm:p-0">
        <div class="d-flex justify-content-around">

            <div class="form-check">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" value="frais inscription" wire:model="types">
                    Frais inscription
                </label>
            </div>
            <div class="form-check">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" value="Releves de cotes" wire:model="types">
                    Releves de cotes
                </label>
            </div>
            <div class="form-check">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" value="enrolement" wire:model="types">
                    Enrolement
                </label>
            </div>


        </div>
        <br>
        <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4">
            <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="far fa-chart-bar"></i>
                            Chart Paiement
                        </h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="shadow rounded p-4 border bg-white flex-1" style="height: 20rem;">
                            <livewire:livewire-column-chart key="{{ $columnChartModel->reactiveKey() }}"
                                :column-chart-model="$columnChartModel" />
                        </div>

                    </div>
                    <!-- /.card-body-->
                </div>

                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="far fa-chart-bar"></i>
                            Donut Chart
                        </h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="shadow rounded p-4 border bg-white flex-1" style="height: 20rem;">
                            <livewire:livewire-pie-chart key="{{ $pieChartModel->reactiveKey() }}"
                                :pie-chart-model="$pieChartModel" />
                        </div>

                    </div>
                    <!-- /.card-body-->
                </div>

            </div>


            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="far fa-chart-bar"></i>
                        Multi Chart
                    </h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="shadow rounded p-4 border bg-white flex-1" style="height: 20rem;">
                        <livewire:livewire-column-chart key="{{ $multiColumnChartModel->reactiveKey() }}"
                            :column-chart-model="$multiColumnChartModel" />
                    </div>

                </div>
                <!-- /.card-body-->
            </div>
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="far fa-chart-bar"></i>
                        Multi Chart
                    </h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">

                </div>
                <!-- /.card-body-->
            </div>






        </div>

    </div>