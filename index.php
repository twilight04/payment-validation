<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Testing</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="/app.js"></script>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white text-center">
                        <h3>Buy Tickets Now</h3>
                        <span class="badge rounded-pill bg-warning text-dark">Select tickets &gt; Your details</span>
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-tabs nav-fill" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="promo-tab" data-bs-toggle="tab" data-bs-target="#promo-tab-pane" type="button" role="tab" aria-controls="promo-tab-pane" aria-selected="true">Promo</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="family-tab" data-bs-toggle="tab" data-bs-target="#family-tab-pane" type="button" role="tab" aria-controls="family-tab-pane" aria-selected="false">Family</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <!-- Promo Tab -->
                            <div class="tab-pane fade show active" id="promo-tab-pane" role="tabpanel" aria-labelledby="promo-tab" tabindex="0">
                                <div class="row p-3">
                                    <div class="col-md-6">
                                        <h5>Promo Tickets</h5>
                                        <h6>&#163;5</h6>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="d-flex justify-content-end align-items-center">
                                            <select id="selectPromoQuantity" class="form-select me-3" aria-label="Select quantity">
                                                <!-- <option value="" selected hidden></option> -->
                                                <option value="1" selected>1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                            <select id="selectPromoDay" class="form-select" aria-label="Select day">
                                                <!-- <option value="" selected hidden></option> -->
                                                <option value="day 1" selected>Day 1</option>
                                                <option value="day 2">Day 2</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row p-3">
                                    <div class="col-md-12 d-flex justify-content-between">
                                        <div class="d-flex align-items-center">
                                            <h6 class="my-auto">Subtotal</h6>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <h6 class="me-3 my-auto">&#163;<span id="promoSubTotal">5</span></h6>
                                            <button class="btn btn-danger px-5 next-btn" id="promoBtn" data-bs-toggle="modal" data-bs-target="#paymentModal">Next</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Family Tab -->
                            <div class="tab-pane fade" id="family-tab-pane" role="tabpanel" aria-labelledby="family-tab" tabindex="0">
                                <div class="row p-3">
                                    <div class="col-md-6">
                                        <h5>Family Tickets</h5>
                                        <h6>&#163;15</h6>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="d-flex justify-content-end align-items-center">
                                            <select id="selectFamilyQuantity" class="form-select me-3" aria-label="Select quantity">
                                                <!-- <option value="" selected hidden></option> -->
                                                <option value="1" selected>1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                            <select id="selectFamilyDay" class="form-select" aria-label="Select day">
                                                <!-- <option value="" selected hidden></option> -->
                                                <option value="day 1" selected>Day 1</option>
                                                <option value="day 2">Day 2</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row p-3">
                                    <div class="col-md-12 d-flex justify-content-between">
                                        <div class="d-flex align-items-center">
                                            <h6 class="my-auto">Subtotal</h6>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <h6 class="me-3 my-auto">&#163;<span id="familySubTotal">15</span></h6>
                                            <button class="btn btn-danger px-5 next-btn" id="familyBtn" data-bs-toggle="modal" data-bs-target="#paymentModal">Next</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer bg-danger text-white text-center">
                        <h6>Promo ends on March 31, 2023</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Payment Modal -->
    <div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="paymentModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="charge.php" method="POST">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="paymentModalLabel">Fill up information</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="ticket_type" id="ticketType">
                        <input type="hidden" name="quantity" id="quantity">
                        <input type="hidden" name="selected_day" id="selectedDay">
                        <input type="hidden" name="sub_total" id="subTotal">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Enter your name">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Proceed</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
</body>

</html>