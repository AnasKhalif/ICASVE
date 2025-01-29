@role('admin')
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="index.html">
                    <i class="fa fa-clone menu-icon"></i>
                    <span class="menu-title">Summary</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="participants.html">
                    <i class="fa fa-users menu-icon"></i>
                    <span class="menu-title">Participants</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="abstracts.html">
                    <i class="fa fa-book menu-icon"></i>
                    <span class="menu-title">Abstracts</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="oral-distribution.html">
                    <i class="fa fa-folder menu-icon"></i>
                    <span class="menu-title">Oral Distribution</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="symposiums.html">
                    <i class="fa fa-columns menu-icon"></i>
                    <span class="menu-title">Symposiums</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="payment.html">
                    <i class="fa fa-credit-card-alt menu-icon"></i>
                    <span class="menu-title">Payment</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="manual-receipt.html">
                    <i class="fa fa-file-text menu-icon"></i>
                    <span class="menu-title">Manual Receipt</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="certificates.html">
                    <i class="fa fa-file menu-icon"></i>
                    <span class="menu-title">Certificates</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="reviewers.html">
                    <i class="fa fa-user menu-icon"></i>
                    <span class="menu-title">Reviewers</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="email-csv.html">
                    <i class="fa fa-envelope menu-icon"></i>
                    <span class="menu-title">Email CSV</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="abstracts-book.html">
                    <i class="fa fa-clipboard menu-icon"></i>
                    <span class="menu-title">Abstracts Book</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="download-files.html">
                    <i class="fa fa-download menu-icon"></i>
                    <span class="menu-title">Download Files</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="upload.html">
                    <i class="fa fa-upload menu-icon"></i>
                    <span class="menu-title">Upload</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="setting.html">
                    <i class="fa fa-cogs menu-icon"></i>
                    <span class="menu-title">Setting</span>
                </a>
            </li>
            <form method="POST" action="{{ route('logout') }}" id="logout-form" style="display: none;">
                @csrf
            </form>
            <li class="nav-item">
                <a class="nav-link" href="setting.html" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fa fa-sign-out menu-icon"></i>
                    <span class="menu-title">Logout</span>
                </a>
            </li>
        </ul>
    </nav>
@endrole
@role(['chief-editor', 'editor'])
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                    <i class="fa fa-user menu-icon"></i>
                    <span class="menu-title">Reviewer</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-basic">
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
                <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false"
                    aria-controls="form-elements">
                    <i class="fa fa-file-text menu-icon"></i>
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
                    <i class="fa fa-cog menu-icon"></i>
                    <span class="menu-title">Editor</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="charts">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">No assignment</a>
                        </li>
                        <li class="nav-item"> <a class="nav-link" href="pages/ui-features/dropdowns.html">No review</a>
                        </li>
                        <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">No
                                decision</a></li>
                        <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">With
                                decision</a></li>
                        <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">All
                                abstracts</a></li>
                        <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Reviewers
                                Workload</a></li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
                    <i class="fa fa-book menu-icon"></i>
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
                <form method="POST" action="{{ route('logout') }}" id="logout-form" style="display: none;">
                    @csrf
                </form>
                <li class="nav-item">
                    <a class="nav-link" href="setting.html" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fa fa-sign-out menu-icon"></i>
                        <span class="menu-title">Logout</span>
                    </a>
                </li>
            </li>

        </ul>
    </nav>
@endrole

@role('reviewer')
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false"
                    aria-controls="ui-basic">
                    <i class="fa fa-user menu-icon"></i>
                    <span class="menu-title">Reviewer</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-basic">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Need to be
                                reviewed</a></li>
                        <li class="nav-item"> <a class="nav-link" href="pages/ui-features/dropdowns.html">Review
                                completed</a></li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false"
                    aria-controls="form-elements">
                    <i class="fa fa-file-text menu-icon"></i>
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
            <form method="POST" action="{{ route('logout') }}" id="logout-form" style="display: none;">
                @csrf
            </form>
            <li class="nav-item">
                <a class="nav-link" href="setting.html" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fa fa-sign-out menu-icon"></i>
                    <span class="menu-title">Logout</span>
                </a>
            </li>
        </ul>
    </nav>
@endrole

@role(['indonesia-presenter', 'foreign-presenter'], ['indonesia-participants', 'foreign-participants'])
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false"
                    aria-controls="ui-basic">
                    <i class="icon-layout menu-icon"></i>
                    <span class="menu-title">Abstract</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false"
                    aria-controls="ui-basic">
                    <i class="icon-layout menu-icon"></i>
                    <span class="menu-title">Payment</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="setting.html">
                    <i class="fa fa-sign-out menu-icon"></i>
                    <span class="menu-title">Logout</span>
                </a>
            </li>
        </ul>
    </nav>
@endrole
