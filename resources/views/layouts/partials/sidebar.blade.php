@role('admin')
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.summary') }}">
                    <i class="fa fa-clone menu-icon"></i>
                    <span class="menu-title">Summary</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.participant.index') }}">
                    <i class="fa fa-users menu-icon"></i>
                    <span class="menu-title">Participants</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.abstract.index') }}">
                    <i class="fa fa-book menu-icon"></i>
                    <span class="menu-title">Abstracts</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.oral.index') }}">
                    <i class="fa fa-folder menu-icon"></i>
                    <span class="menu-title">Oral Distribution</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.symposium.index') }}">
                    <i class="fa fa-columns menu-icon"></i>
                    <span class="menu-title">Symposiums</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.payment.index') }}">
                    <i class="fa fa-credit-card-alt menu-icon"></i>
                    <span class="menu-title">Payment</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.manual-receipt.create') }}">
                    <i class="fa fa-file-text menu-icon"></i>
                    <span class="menu-title">Manual Receipt</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.certificates.index') }}">
                    <i class="fa fa-file menu-icon"></i>
                    <span class="menu-title">Certificates</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.reviewer.index') }}">
                    <i class="fa fa-user menu-icon"></i>
                    <span class="menu-title">Reviewers</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.email.csv') }}">
                    <i class="fa fa-envelope menu-icon"></i>
                    <span class="menu-title">Email CSV</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.abstract.bySymposium') }}">
                    <i class="fa fa-clipboard menu-icon"></i>
                    <span class="menu-title">Abstracts Book</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.download.index') }}">
                    <i class="fa fa-download menu-icon"></i>
                    <span class="menu-title">Download Files</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.upload.index') }}">
                    <i class="fa fa-upload menu-icon"></i>
                    <span class="menu-title">Upload</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.settings.index') }}">
                    <i class="fa fa-cogs menu-icon"></i>
                    <span class="menu-title">Setting</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.years.index') }}">
                    <i class="fa fa-calendar menu-icon"></i>
                    <span class="menu-title">Years</span>
                </a>
            </li>
        </ul>
    </nav>
@endrole
@role(['chief-editor', 'editor'])
    <nav class="sidebar sidebar-offcanvas">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('reviewer.summary') }}">
                    <i class="fa fa-clone menu-icon"></i>
                    <span class="">Dashboard</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" aria-expanded="false" aria-controls="ui-basic">
                    <i class="fa fa-user menu-icon"></i>
                    <span class="menu-title">Reviewer</span>
                    <i class="menu-arrow"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('reviewer.review.index') }}">
                    <span class="menu-title">Need to be reviewed</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('reviewer.review.review-completed') }}">
                    <span class="menu-title">Review completed</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" aria-expanded="false" aria-controls="form-elements">
                    <i class="fa fa-file-text menu-icon"></i>
                    <span class="menu-title">Reviewer: Paper</span>
                    <i class="menu-arrow"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('reviewer.review-fullpaper.index') }}">
                    <span class="menu-title">Need to be reviewed</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('reviewer.review-fullpaper.review-completed') }}">
                    <span class="menu-title">Reviewed completed</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" aria-expanded="false" aria-controls="charts">
                    <i class="fa fa-cog menu-icon"></i>
                    <span class="menu-title">Editor</span>
                    <i class="menu-arrow"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('reviewer.editor.noReviewer') }}">
                    <span class="menu-title">No review</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('reviewer.editor.noDecision') }}">
                    <span class="menu-title">No decision</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('reviewer.editor.withDecision') }}">
                    <span class="menu-title">With Decision</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('reviewer.editor.index') }}">
                    <span class="menu-title">All abstract</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" aria-expanded="false" aria-controls="tables">
                    <i class="fa fa-book menu-icon"></i>
                    <span class="menu-title">Editor: Paper</span>
                    <i class="menu-arrow"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('reviewer.editor-fullpaper.noReviewer') }}">
                    <span class="menu-title">No review</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('reviewer.editor-fullpaper.revision') }}">
                    <span class="menu-title">Revision req</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('reviewer.editor-fullpaper.noDecision') }}">
                    <span class="menu-title">No Decision</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('reviewer.editor-fullpaper.withDecision') }}">
                    <span class="menu-title">With Decision</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('reviewer.editor-fullpaper.index') }}">
                    <span class="menu-title">All papers</span>
                </a>
            </li>

        </ul>
    </nav>
@endrole

@role('reviewer')
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('reviewer.summary') }}">
                    <i class="fa fa-clone menu-icon"></i>
                    <span class="menu-title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" aria-expanded="false" aria-controls="ui-basic">
                    <i class="fa fa-user menu-icon"></i>
                    <span class="menu-title">Reviewer</span>
                    <i class="menu-arrow"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('reviewer.review.index') }}">
                    <span class="menu-title">Need to be reviewed</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('reviewer.review.review-completed') }}">
                    <span class="menu-title">Reviewed completed</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" aria-expanded="false" aria-controls="form-elements">
                    <i class="fa fa-file-text menu-icon"></i>
                    <span class="menu-title">Reviewer: Paper</span>
                    <i class="menu-arrow"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('reviewer.review-fullpaper.index') }}">
                    <span class="menu-title">Need to be reviewed</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('reviewer.review-fullpaper.review-completed') }}">
                    <span class="menu-title">Reviewed completed</span>
                </a>
            </li>
        </ul>
    </nav>
@endrole

@role(['indonesia-presenter', 'foreign-presenter', 'indonesia-participants', 'foreign-participants'])
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard') }}">
                    <i class="fa fa-clone menu-icon"></i>
                    <span class="menu-title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('abstracts.index') }}">
                    <i class="fa fa-book menu-icon"></i>
                    <span class="menu-title">Abstract</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('filepayments.create') }}">
                    <i class="fa fa-credit-card-alt menu-icon"></i>
                    <span class="menu-title">Payment</span>
                </a>
            </li>
        </ul>
    </nav>
@endrole

@role('landing-editor')
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('landing.landingpage.index') }}">
                    <i class="fa-solid fa-house-chimney menu-icon"></i>
                    <span class="menu-title">Landing Page</span>
                </a>
            </li>
    
            <li class="nav-item">
                <a class="nav-link" href="{{ route('landing.logos.index') }}">
                    <i class="fa-brands fa-slack menu-icon"></i>
                    <span class="menu-title">Logo</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('landing.themes.index') }}">
                    <i class="fa-solid fa-list-check menu-icon"></i>
                    <span class="menu-title">Theme</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('landing.committee.index') }}">
                    <i class="fa-solid fa-users menu-icon"></i>
                    <span class="menu-title"> Committe</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('landing.conferencelanding.index') }}">
                    <i class="fa-solid fa-calendar-alt menu-icon"></i>
                    <span class="menu-title">Conference Program</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('landing.gallery.index') }}">
                    <i class="fa-solid fa-images menu-icon"></i>
                    <span class="menu-title">Gallery</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('landing.faq.index') }}">
                    <i class="fa-solid fa-question menu-icon"></i>
                    <span class="menu-title">FAQ</span>
                </a>
            </li>

            
            <li class="nav-item">
                <a class="nav-link" href="{{ route('landing.abstract-guidelines.index') }}">
                   <i class="fa-brands fa-readme menu-icon"></i>
                    <span class="menu-title">Abstract Gudelines</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('landing.fullpaper-guidelines.index') }}">
                   <i class="fa-brands fa-readme menu-icon"></i>
                    <span class="menu-title">Fullpaper Gudelines</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('landing.presentation-guidelines.index') }}">
                   <i class="fa-brands fa-readme menu-icon"></i>
                    <span class="menu-title">Presentation Guidelines</span>
                </a>
            </li>
            
        </ul>
    </nav>
@endrole
