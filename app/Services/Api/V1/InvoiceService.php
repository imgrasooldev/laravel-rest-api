<?php

namespace App\Services\Api\V1;

use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceService
{
    public function storeBulkInvoices($bulk): object
    {
        # Store Bulk Invoices
        Invoice::insert($bulk->toArray());
        return $bulk;
    }
}
