@extends('layouts.client')

@section('title', 'Facture ' . $invoice->number)

@section('content')
<div class="lg:flex lg:items-center lg:justify-between mb-8">
    <div class="min-w-0 flex-1">
        <nav class="flex" aria-label="Breadcrumb">
            <ol role="list" class="flex items-center space-x-4">
                <li>
                    <div class="flex">
                        <a href="{{ route('client.invoices.index') }}" class="text-sm font-medium text-gray-500 hover:text-gray-700">Factures</a>
                    </div>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="h-5 w-5 flex-shrink-0 text-gray-400" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                            <path d="M5.555 17.776l8-16 .894.448-8 16-.894-.448z" />
                        </svg>
                        <span class="ml-4 text-sm font-medium text-gray-500">{{ $invoice->number }}</span>
                    </div>
                </li>
            </ol>
        </nav>
    </div>
    <div class="mt-5 flex lg:ml-4 lg:mt-0">
        <button type="button" class="inline-flex items-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
            <svg class="mr-1.5 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm.75-11.25a.75.75 0 00-1.5 0v2.5h-2.5a.75.75 0 000 1.5h2.5v2.5a.75.75 0 001.5 0v-2.5h2.5a.75.75 0 000-1.5h-2.5v-2.5z" clip-rule="evenodd" />
            </svg>
            Télécharger PDF
        </button>
    </div>
</div>

<div class="bg-white shadow-lg sm:rounded-lg overflow-hidden border border-gray-200">
    <div class="px-4 py-5 sm:p-6">
        <!-- Invoice Header -->
        <div class="flex justify-between items-start border-b border-gray-200 pb-8 mb-8">
            <div>
                 <h2 class="text-3xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-blue-600 to-cyan-500 mb-2">ZYGNIXIS</h2>
                 <p class="text-sm text-gray-500">Solutions Digitales & Web</p>
                 <p class="text-sm text-gray-500">Yaoundé, Cameroun</p>
            </div>
            <div class="text-right">
                <h1 class="text-2xl font-bold text-gray-900">FACTURE</h1>
                <p class="text-lg font-medium text-gray-500 mt-1">#{{ $invoice->number }}</p>
                <div class="mt-4">
                     <span class="inline-flex items-center rounded-md bg-{{ $invoice->status_color }}-50 px-2 py-1 text-sm font-medium text-{{ $invoice->status_color }}-700 ring-1 ring-inset ring-{{ $invoice->status_color }}-600/20">
                        {{ $invoice->status_label }}
                    </span>
                </div>
            </div>
        </div>

        <!-- Meta Info -->
        <div class="grid grid-cols-2 gap-8 mb-8">
            <div>
                <h3 class="text-sm font-medium text-gray-500 mb-1">Facturé à</h3>
                <p class="text-base font-semibold text-gray-900">{{ auth()->user()->name }}</p>
                <p class="text-sm text-gray-600">{{ auth()->user()->email }}</p>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                     <h3 class="text-sm font-medium text-gray-500 mb-1">Date d'émission</h3>
                     <p class="text-base text-gray-900">{{ $invoice->issue_date->format('d/m/Y') }}</p>
                </div>
                <div>
                     <h3 class="text-sm font-medium text-gray-500 mb-1">Date d'échéance</h3>
                     <p class="text-base text-gray-900">{{ $invoice->due_date->format('d/m/Y') }}</p>
                </div>
            </div>
        </div>

        <!-- Items Table -->
        <table class="min-w-full divide-y divide-gray-200 mb-8">
            <thead>
                <tr>
                    <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">Description</th>
                    <th scope="col" class="px-3 py-3.5 text-right text-sm font-semibold text-gray-900">Montant</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                <tr>
                    <td class="py-4 pl-4 pr-3 text-sm text-gray-900 sm:pl-0">
                        <p class="font-medium">Prestation de services</p>
                        @if($invoice->project)
                            <p class="text-gray-500">Projet : {{ $invoice->project->title }}</p>
                        @endif
                    </td>
                    <td class="px-3 py-4 text-sm text-gray-900 text-right">{{ number_format($invoice->amount, 0, ',', ' ') }} FCFA</td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <th scope="row" colspan="1" class="hidden pl-6 pr-3 pt-6 text-right text-sm font-normal text-gray-500 sm:table-cell sm:pl-0">Total</th>
                    <td class="pl-3 pr-4 pt-6 text-right text-sm text-gray-500 sm:pr-0">{{ number_format($invoice->amount, 0, ',', ' ') }} FCFA</td>
                </tr>
                <tr>
                    <th scope="row" colspan="1" class="hidden pl-6 pr-3 pt-4 text-right text-sm font-semibold text-gray-900 sm:table-cell sm:pl-0">Total à payer</th>
                    <td class="pl-3 pr-4 pt-4 text-right text-sm font-semibold text-gray-900 sm:pr-0">{{ number_format($invoice->amount, 0, ',', ' ') }} FCFA</td>
                </tr>
            </tfoot>
        </table>

        <!-- Footer -->
        <div class="border-t border-gray-200 pt-8 text-sm text-gray-500">
            <p>Merci de votre confiance.</p>
            <p class="mt-1">Paiement par virement bancaire ou mobile money.</p>
        </div>
    </div>
</div>
@endsection
