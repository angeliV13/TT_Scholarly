<div class="modal fade" id="viewInfoModal" tabindex="-1" data-bs-focus="false">
    <div class="modal-dialog modal-dialog-scrollable modal-fullscreen modal-dialog-centered">
        <div class="modal-content">
            <input type="hidden" id="accountViewId">
            <div class="modal-header gap-3">
                <form class="btn-group-toggle" data-toggle="buttons" onchange="infoRadio()">
                    <input type="radio" class="btn-check" name="info" id="infoProfile" value="1" autocomplete="off" checked>
                    <label class="btn btn-outline-danger" for="infoProfile">Profile</label>

                    <input type="radio" class="btn-check" name="info" id="infoRequirements" value="2" autocomplete="off">
                    <label class="btn btn-outline-danger" for="infoRequirements">Requirements</label>
                </form>
                <!-- CURRENT STATUS LABEL TEXT -->
                <div class="d-flex justify-content-center align-items-center gap-3">
                    <div class="text-center">
                        <h5 class="text-center">Current Status:</h5>
                        <h6 class="text-center" id="currentStatus">Pending</h6>
                    </div>
                </div>
                <div class="d-flex justify-content-center align-items-center gap-3">
                    <div id="qualiRadio">
                        <input class="form-check-input me-2" type="radio" name="decisionRadio" value="2" id="decisionRadio1">
                        <label class="form-check-label" for="decisionRadio1" id="changeRadio1">For Qualification Exam</label>
                    </div>
                    <div id="intRadio">
                        <input class="form-check-input me-2" type="radio" name="decisionRadio" value="3" id="decisionRadio2">
                        <label class="form-check-label" for="decisionRadio2" id="changeRadio">For Interview</label>
                    </div>
                    <div id="approveRadio">
                        <input class="form-check-input me-2" type="radio" name="decisionRadio" value="4" id="decisionRadio3">
                        <label class="form-check-label" for="decisionRadio3">Approve Application</label>
                    </div>
                    <div id="rejectRadio">
                        <input class="form-check-input me-2" type="radio" name="decisionRadio" value="5" id="decisionRadio4">
                        <label class="form-check-label" for="decisionRadio4">Reject Application</label>
                    </div>
                    <div id="emailRadio">
                        <input class="form-check-input me-2" type="radio" name="decisionRadio" value="6">
                        <label class="form-check-label" for="decisionRadio">Send Email Notification</label>
                    </div>
                </div>
                <div>
                    <!-- <button type="button" class="btn btn-sm btn-primary" id="openButton">Add Comment</button> -->
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
            </div>
            <div class="modal-body" id="viewInfoModalBody">

            </div>

            <!-- Action Buttons -->
            <!-- <div class="modal-footer  d-grid gap-2 d-flex justify-content-end" style="height: 55px;">
                <button type="button" class="btn btn-warning btn-sm">Submit</button>
                <button type="button" class="btn btn-danger btn-sm">Cancel Submission</button>
            </div> -->
        </div>
    </div>
</div>