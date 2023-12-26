<div class="row">

    <div class="col-md-4">
        <button type="button" class="btn btn-block btn-primary mb-3" data-toggle="modal" data-target="#modal-default">Cash</button>
        <div class="modal fade" id="modal-default" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
            <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <div class="card bg-secondary border-0 mb-0">
                            <div class="card-body px-lg-5 py-lg-5">
                                <div class="text-center text-muted mb-4">
                                    <small>*Collect reference No from the chash counter</small>
                                </div>
                                <div class="form-group mb-3">
                                    <div class="input-group input-group-merge input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">#</i></span>
                                        </div>
                                        <input class="form-control" type="numeric" maxlength="8" placeholder="Enter Reference No" name="cash_ref">
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary my-4" name="cash_payment">Proceed</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <button type="button" class="btn btn-block btn-warning mb-3" data-toggle="modal" data-target="#modal-notification">Card</button>
        <div class="modal fade" id="modal-notification" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
            <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <div class="card bg-secondary border-0 mb-0">
                            <div class="card-body px-lg-5 py-lg-5">
                                <div class="text-center text-muted mb-4">
                                    <small>Enter your Debit/Credit/Mastercard Credentials</small>
                                </div>
                                <div class="form-group mb-3">
                                    <div class="input-group input-group-merge input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-credit-card"></i></span>
                                        </div>
                                        <input class="form-control" type="tel" inputmode="numeric" pattern="[0-9\s]{13,19}" maxlength="19" placeholder="xxxx xxxx xxxx xxxx" name="card_number">
                                    </div>
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                    </div>
                                    <input type="numeric" class="form-control" maxlength="2" placeholder="MM">
                                    <input type="numeric" class="form-control" maxlength="2" placeholder="YY">
                                </div>
                                <div class="form-group">
                                    <div class="input-group input-group-merge input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                        </div>
                                        <input class="form-control" placeholder="CVC" type="password" inputmode="numeric"maxlength="4">
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary my-4" name="card_payment">Proceed</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <button type="button" class="btn btn-block btn-default" data-toggle="modal" data-target="#modal-form">Mobile Banking</button>
        <div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
            <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <div class="card bg-secondary border-0 mb-0">
                            <div class="card-header bg-transparent pb-5">
                                <div class="text-muted text-center mt-2 mb-3"><small>Select mBanking Provider</small></div>
                                <div class="text-center">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="customRadioInline1" name="bKash" class="custom-control-input">
                                        <label class="custom-control-label" for="customRadioInline1">bKash</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="customRadioInline2" name="Nagad" class="custom-control-input">
                                        <label class="custom-control-label" for="customRadioInline2">Nagad</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="customRadioInline3" name="Rocket" class="custom-control-input">
                                        <label class="custom-control-label" for="customRadioInline3">Rocket</label>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body px-lg-5 py-lg-5">
                                <div class="text-center text-muted mb-4">
                                    <small>Enter your mBanking Account Credentials</small>
                                </div>
                                <div class="form-group mb-3">
                                    <div class="input-group input-group-merge input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-mobile-button"></i></span>
                                        </div>
                                        <input class="form-control" type="tel" inputmode="numeric" maxlength="11" placeholder="01x xxx xxxxx" name="mbank_number">

                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group input-group-merge input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                        </div>
                                        <input class="form-control" placeholder="Pin" type="password" inputmode="numeric" maxlength="4">

                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary my-4" name="mbank_payment">Proceed</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
