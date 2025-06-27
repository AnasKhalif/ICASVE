<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EmailTemplate;
use App\Traits\FlashAlert;

class EmailTemplateController extends Controller
{
    use FlashAlert;

    public function index()
    {
        return view('email-template.index');
    }
    public function edit($type)
    {
        $emailTemplate = EmailTemplate::where('type', $type)->firstOrNew([
            'type' => $type
        ]);
        return view('email-template.edit', compact('emailTemplate'));
    }

    public function update(Request $request, $type)
    {
        $amountType = null;

        if ($type == 'abstract_invoice_idr') {
            $amountType = 'idr';
        } else if ($type == 'abstract_invoice_usd') {
            $amountType = 'usd';
        }

        $emailTemplate = EmailTemplate::updateOrCreate(
            ['type' => $type],
            ['content' => $request->content, 'amount' => $request->amount, 'amount_type' => $amountType]
        );

        return redirect()->back()->with($this->alertUpdated());
    }
}
