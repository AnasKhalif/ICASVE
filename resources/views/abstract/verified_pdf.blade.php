<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Abstracts</title>
    <style>
        body {
            font-family: "Times New Roman", Times, serif;
            font-size: 12pt;
            padding: 2cm;
        }

        h2 {
            text-align: center;
            font-size: 18pt;
            font-weight: bold;
            text-transform: uppercase;
        }

        .abstract {
            position: relative;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            page-break-after: always;
        }

        .abstract:last-child {
            page-break-after: auto;
        }

        #abstract_title {
            font-size: 16pt;
            font-weight: bold;
            text-align: center;
            margin-bottom: 0px;
        }

        #abstract_author,
        #abstract_affiliation {
            text-align: center;
            font-size: 12pt;
            font-style: italic;
        }

        #abstract_email {
            text-align: center;
            font-size: 11pt;
            font-weight: bold;
        }

        #abstract_body {
            text-align: justify;
            font-size: 11pt;
            line-height: 1.5;
        }

        .symposium-title {
            font-size: 16pt;
            font-weight: bold;
            text-transform: uppercase;
            margin-top: 20px;
            text-align: center;
        }

        .page-number {
            position: absolute;
            bottom: 0px;
            left: 50%;
            transform: translateX(-50%);
            font-size: 11pt;
            text-align: center;
            padding-bottom: 10px;
            width: 100%;
        }

        /* Committee specific styles */
        .committee-section {
            text-align: center;
            margin-bottom: 40px;
        }

        .committee-page {
            page-break-after: always;
            min-height: 100vh;
        }

        .committee-title {
            font-size: 24pt;
            font-weight: bold;
            margin-bottom: 30px;
        }

        .conference-info {
            font-size: 14pt;
            margin-bottom: 10px;
        }

        .conference-theme {
            font-size: 14pt;
            margin-bottom: 40px;
        }

        .steering-committee-title {
            font-size: 16pt;
            font-weight: bold;
            text-align: left;
            margin-bottom: 20px;
            margin-top: 30px;
        }

        .committee-list {
            text-align: left;
            font-size: 12pt;
            line-height: 1.6;
        }

        .committee-list ol {
            padding-left: 20px;
        }

        /* Organizing Committee specific styles */
        .organizing-committee-list {
            text-align: left;
            font-size: 12pt;
            line-height: 1.8;
            margin-top: 20px;
        }

        .committee-role {
            display: flex;
            margin-bottom: 15px;
            align-items: flex-start;
        }

        .role-title {
            min-width: 180px;
            font-weight: normal;
            flex-shrink: 0;
        }

        .role-separator {
            margin: 0 10px;
            flex-shrink: 0;
        }

        .role-members {
            flex-grow: 1;
        }

        /* Speakers specific styles */
        .speakers-section {
            text-align: center;
            margin-bottom: 40px;
        }

        .speakers-page {
            page-break-after: always;
            min-height: 100vh;
        }

        .speakers-container {
            display: flex;
            justify-content: center;
            gap: 40px;
            margin-top: 30px;
        }

        .speaker-card {
            text-align: center;
            max-width: 350px;
            min-width: 300px;
        }

        .speaker-photo {
            width: 200px;
            height: 200px;
            border-radius: 10px;
            object-fit: cover;
            margin: 0 auto 15px auto;
            display: block;
            border: 2px solid #ddd;
        }

        .speaker-name {
            font-size: 14pt;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .speaker-title {
            font-size: 12pt;
            margin-bottom: 5px;
        }

        .speaker-institution {
            font-size: 12pt;
            line-height: 1.4;
            margin-bottom: 5px;
        }
    </style>
</head>

<body>
    <div class="committee-section committee-page">
        <h1 class="committee-title">Committee</h1>
        <div class="conference-info">The 2025 International Conference (ICASVE 2025)</div>
        
        <p class="steering-committee-title">Steering Committee</p>
        <div class="committee-list">
            <ol>
                @foreach ($steeringCommittee as $member)
                    <li>{{ $member->name }} ({{ $member->institution }}, {{ $member->country }})</li>
                @endforeach
            </ol>
        </div>
    </div>

    <div class="committee-section committee-page">   
        <p class="steering-committee-title">Organizing Committee</p>
        <div class="organizing-committee-list">
            @php
                $groupedCommittee = $organizingCommittee->groupBy('category');
            @endphp
            
            @foreach ($groupedCommittee as $category => $members)
                <div class="committee-role">
                    <span class="role-title">{{ $category }}</span>
                    <span class="role-separator">:</span>
                    <span class="role-members">
                        @foreach ($members as $index => $member)
                            {{ $member->name }}@if(!$loop->last)<br>@endif
                        @endforeach
                    </span>
                </div>
            @endforeach
        </div>
    </div>

    <div class="committee-section committee-page">
        <h1 class="committee-title">Reviewer</h1>
        <div class="conference-info">The 2025 International Conference (ICASVE 2025)</div>
        
        <div class="committee-list">
            <ol>
                @foreach ($reviewerCommittee as $member)
                    <li>{{ $member->name }}, {{ $member->institution }}, {{ $member->country }}</li>
                @endforeach
            </ol>
        </div>
    </div>

    @if(isset($keynoteSpeakers) && $keynoteSpeakers->count() > 0)
        <div class="committee-section committee-page">
            <h1 class="committee-title">Keynote Speakers</h1>
            <div class="conference-info">The 2025 International Conference (ICASVE 2025)</div>
            
            <div class="committee-list">
                <ol>
                    @foreach($keynoteSpeakers as $speaker)
                        <li>{{ $speaker->name }} - {{ $speaker->institution }}</li>
                    @endforeach
                </ol>
            </div>
        </div>
    @endif

    @if(isset($invitedSpeakers) && $invitedSpeakers->count() > 0)
    <div class="committee-section committee-page">   
        <p class="steering-committee-title">Invited Speakers</p>
        <div class="organizing-committee-list">    
           <ol>
             @foreach($invitedSpeakers as $speaker)
                 <li>{{ $speaker->name }} - {{ $speaker->institution }}</li>
             @endforeach
            </ol>
        </div>
    </div>
    @endif


    @foreach ($abstracts as $abstract)
        <div class="abstract">
            <h3 id="abstract_title">{{ $abstract->title }}</h3>
            <p class="text-uppercase font-weight-bold">
                {{ $abstract->symposium->abbreviation ?? 'N/A' }} /
                {{ str_pad($loop->iteration, 3, '0', STR_PAD_LEFT) }}
            </p>
            <p id="abstract_author">{!! $abstract->formattedAuthors !!}</p>
            <p id="abstract_affiliation">{!! $abstract->formattedAffiliations !!}</p>
            <p id="abstract_email"><strong>Corresponding Email:</strong> {{ $abstract->corresponding_email }}</p>
            <p id="abstract_abstract" style="font-size: 14pt; font-weight: bold; text-align: left;">Abstract:</p>
            <div id="abstract_body">
                {!! nl2br(e($abstract->abstract)) !!}
            </div>
            <div class="page-number">{{ $loop->iteration }}</div>
        </div>
    @endforeach
</body>
</html>