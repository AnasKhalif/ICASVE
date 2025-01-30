@role('admin')
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.summary') }}">
                    <i class="icon-grid menu-icon"></i>
                    <span class="menu-title">Summary</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.participant.index') }}">
                    <i class="mdi mdi-account-star menu-icon"></i>
                    <span class="menu-title">Participants</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="abstracts.html">
                    <i class="mdi mdi-book-open-page-variant menu-icon"></i>
                    <span class="menu-title">Abstracts</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="oral-distribution.html">
                    <i class="icon-grid menu-icon"></i>
                    <span class="menu-title">Oral Distribution</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.symposium.index') }}">
                    <i class="icon-grid menu-icon"></i>
                    <span class="menu-title">Symposiums</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="payment.html">
                    <i class="icon-grid menu-icon"></i>
                    <span class="menu-title">Payment</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="manual-receipt.html">
                    <i class="icon-grid menu-icon"></i>
                    <span class="menu-title">Manual Receipt</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="certificates.html">
                    <i class="icon-grid menu-icon"></i>
                    <span class="menu-title">Certificates</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.reviewer.index') }}">
                    <i class="icon-grid menu-icon"></i>
                    <span class="menu-title">Reviewers</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="email-csv.html">
                    <i class="icon-grid menu-icon"></i>
                    <span class="menu-title">Email CSV</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="abstracts-book.html">
                    <i class="icon-grid menu-icon"></i>
                    <span class="menu-title">Abstracts Book</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="download-files.html">
                    <i class="icon-grid menu-icon"></i>
                    <span class="menu-title">Download Files</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="upload.html">
                    <i class="icon-grid menu-icon"></i>
                    <span class="menu-title">Upload</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="setting.html">
                    <i class="icon-grid menu-icon"></i>
                    <span class="menu-title">Setting</span>
                </a>
            </li>
        </ul>
    </nav>
@endrole
@role(['chief-editor', 'editor'])
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('reviewer.summary') }}">
                    <i class="icon-grid menu-icon"></i>
                    <span class="menu-title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                    <i class="icon-layout menu-icon"></i>
                    <span class="menu-title">Reviewer</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-basic">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="{{ route('reviewer.reviewer.index') }}">Need to be
                                reviewed</a></li>
                        <li class="nav-item"> <a class="nav-link" href="pages/ui-features/dropdowns.html">Review
                                completed</a></li>
                        <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Closed by
                                editor</a></li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false"
                    aria-controls="form-elements">
                    <i class="icon-columns menu-icon"></i>
                    <span class="menu-title">Reviewer: Paper</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="form-elements">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Need to be
                                reviewed</a></li>
                        <li class="nav-item"> <a class="nav-link" href="pages/ui-features/dropdowns.html">Review
                                completed</a></li>
                        <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Closed by
                                editor</a></li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
                    <i class="icon-bar-graph menu-icon"></i>
                    <span class="menu-title">Editor</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="charts">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">No assignment</a>
                        </li>
                        <li class="nav-item"> <a class="nav-link" href="pages/ui-features/dropdowns.html">No review</a>
                        </li>
                        <li class="nav-item"> <a class="nav-link" href="#">No
                                decision</a></li>
                        <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">With
                                decision</a></li>
                        <li class="nav-item"> <a class="nav-link" href="{{ route('reviewer.editor.index') }}">All
                                abstracts</a></li>
                        <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Reviewers
                                Workload</a></li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
                    <i class="icon-grid-2 menu-icon"></i>
                    <span class="menu-title">Editor: Paper</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="tables">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">No assignment</a>
                        </li>
                        <li class="nav-item"> <a class="nav-link" href="pages/ui-features/dropdowns.html">Under
                                review</a></li>
                        <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Revision
                                req</a></li>
                        <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">With
                                decision</a></li>
                        <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">All papers</a>
                        </li>
                        <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Reviewers
                                Workload</a></li>
                    </ul>
                </div>
            </li>

        </ul>
    </nav>
@endrole

@role('reviewer')
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('reviewer.summary') }}">
                    <i class="icon-grid menu-icon"></i>
                    <span class="menu-title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false"
                    aria-controls="ui-basic">
                    <i class="icon-layout menu-icon"></i>
                    <span class="menu-title">Reviewer</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-basic">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="{{ route('reviewer.review.index') }}">Need to
                                be
                                reviewed</a></li>
                        <li class="nav-item"> <a class="nav-link" href="pages/ui-features/dropdowns.html">Review
                                completed</a></li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false"
                    aria-controls="form-elements">
                    <i class="icon-columns menu-icon"></i>
                    <span class="menu-title">Reviewer: Paper</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="form-elements">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Need to be
                                reviewed</a></li>
                        <li class="nav-item"> <a class="nav-link" href="pages/ui-features/dropdowns.html">Review
                                completed</a></li>
                    </ul>
                </div>
            </li>

        </ul>
    </nav>
@endrole

@role(['indonesia-presenter', 'foreign-presenter', 'indonesia-participants', 'foreign-participants'])
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard') }}">
                    <i class="icon-grid menu-icon"></i>
                    <span class="menu-title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('abstracts.index') }}">
                    <i class="icon-layout menu-icon"></i>
                    <span class="menu-title">Abstract</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#ui-basic">
                    <i class="icon-layout menu-icon"></i>
                    <span class="menu-title">Payment</span>
                </a>
            </li>
        </ul>
    </nav>
@endrole
