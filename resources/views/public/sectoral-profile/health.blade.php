@extends('layouts.public')
@section('title', 'Health Sector | Wabag DDA')
@section('content')
<section class="py-12 bg-white">
    <div class="container mx-auto px-4 lg:px-6 max-w-7xl">
        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Main Content (2/3 width) -->
            <div class="lg:w-2/3">
                <!-- Breadcrumbs -->
                <nav class="flex mb-6" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-2">
                        <li class="inline-flex items-center">
                            <a href="/" class="inline-flex items-center text-sm font-medium text-wabag-green hover:text-green-800 transition">
                                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                                Home
                            </a>
                        </li>
                        <li>
                            <div class="flex items-center">
                                <svg class="w-5 h-5 text-gray-300" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                                <a href="#" class="ml-2 text-sm font-medium text-wabag-green hover:text-green-800 transition">Sectoral Profiles</a>
                            </div>
                        </li>
                        <li aria-current="page">
                            <div class="flex items-center">
                                <svg class="w-5 h-5 text-gray-300" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                                <span class="ml-2 text-sm font-medium text-gray-500">Health Development Profile</span>
                            </div>
                        </li>
                    </ol>
                </nav>

                <!-- Sectoral Profile Content -->
                <article class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                    <header class="px-6 pt-6 pb-4">
                        <span class="inline-block bg-yellow-100 text-green-800 text-xs font-semibold px-3 py-1 rounded-full mb-4 uppercase tracking-wider">
                            Health Sector
                        </span>
                        <h1 class="text-3xl lg:text-4xl font-serif font-bold text-wabag-black mb-3 leading-tight">Health Development Profile</h1>
                    </header>

                    <div class="px-6 pb-8">
                        <div class="formatted-content text-gray-700">
                            <!-- Health Status -->
                            <div class="font-bold text-2xl mt-6 mb-4 text-wabag-green">SECTORAL DEVELOPMENT PROFILE</div>
                            <div class="font-bold text-xl mt-5 mb-3 text-wabag-green">Health Status</div>
                            <div class="mb-4 leading-relaxed">
                                Enga Province has been one of the pioneering provinces to adopt the Provincial Health Authority System. All health workers come under the PHA and are answerable to the board under the Health Minister. Within the district structure, we have a District Health Officer and Nursing Officer position which play surveillance and supervisory roles.
                            </div>

                            <!-- Basic Health Indices -->
                            <div class="font-bold text-lg mt-6 mb-3 text-wabag-green border-b pb-2">Basic Health Indices</div>
                            <div class="mb-4 leading-relaxed">
                                Health indicators show an infant mortality rate of 81 per 1000 live births and maternal mortality of 12 per 100,000. Male life expectancy is 57 years and female is 53-60 years. Wabag has the highest mortality rate compared to other districts in the province. This trend is anticipated to improve with better health facilities and district management of critically ill patients.
                            </div>

                            <!-- Stats Grid -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                                <div class="bg-yellow-100 p-4 rounded-lg border border-yellow-200">
                                    <div class="text-sm text-green-800 font-semibold mb-1">Infant Mortality Rate</div>
                                    <div class="text-2xl font-bold">81 per 1000</div>
                                    <div class="text-xs text-gray-500 mt-1">Live births</div>
                                </div>
                                <div class="bg-yellow-100 p-4 rounded-lg border border-yellow-200">
                                    <div class="text-sm text-green-800 font-semibold mb-1">Maternal Mortality</div>
                                    <div class="text-2xl font-bold">12 per 100,000</div>
                                </div>
                                <div class="bg-yellow-100 p-4 rounded-lg border border-yellow-200">
                                    <div class="text-sm text-green-800 font-semibold mb-1">Life Expectancy (Male)</div>
                                    <div class="text-2xl font-bold">57 years</div>
                                </div>
                                <div class="bg-yellow-100 p-4 rounded-lg border border-yellow-200">
                                    <div class="text-sm text-green-800 font-semibold mb-1">Life Expectancy (Female)</div>
                                    <div class="text-2xl font-bold">53-60 years</div>
                                </div>
                            </div>

                            <!-- Table 8 -->
                            <div class="font-semibold text-lg mt-6 mb-2 text-gray-700">Table 8: Leading causes of admission in the district (last 5 years)</div>
                            <div class="overflow-x-auto mb-6">
                                <table class="min-w-full">
                                    <thead>
                                        <tr class="bg-gray-50">
                                            <th class="py-3 px-4 text-left text-sm font-semibold text-gray-700 border-b">No.</th>
                                            <th class="py-3 px-4 text-left text-sm font-semibold text-gray-700 border-b">Disease Cause</th>
                                            <th class="py-3 px-4 text-left text-sm font-semibold text-gray-700 border-b">Total Admission</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200">
                                        <tr>
                                            <td class="py-3 px-4 text-sm font-medium text-gray-900">1</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">Diarrhea</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">649</td>
                                        </tr>
                                        <tr>
                                            <td class="py-3 px-4 text-sm font-medium text-gray-900">2</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">Malaria</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">468</td>
                                        </tr>
                                        <tr>
                                            <td class="py-3 px-4 text-sm font-medium text-gray-900">3</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">Other Respiratory Infections</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">331</td>
                                        </tr>
                                        <tr>
                                            <td class="py-3 px-4 text-sm font-medium text-gray-900">4</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">TB</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">215</td>
                                        </tr>
                                        <tr>
                                            <td class="py-3 px-4 text-sm font-medium text-gray-900">5</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">Typhoid</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">169</td>
                                        </tr>
                                        <tr>
                                            <td class="py-3 px-4 text-sm font-medium text-gray-900">6</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">Tribal Fights</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">1000</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="mb-4 leading-relaxed">
                                The common cause of deaths in Wabag district is diarrhea with 649 admissions, followed by malaria and other respiratory infections.
                            </div>

                            <!-- Leading Causes of Death -->
                            <div class="font-semibold text-lg mt-6 mb-2 text-gray-700">Leading Causes of Death</div>
                            <div class="overflow-x-auto mb-6">
                                <table class="min-w-full">
                                    <thead>
                                        <tr class="bg-gray-50">
                                            <th class="py-3 px-4 text-left text-sm font-semibold text-gray-700 border-b">No.</th>
                                            <th class="py-3 px-4 text-left text-sm font-semibold text-gray-700 border-b">Cause of Death</th>
                                            <th class="py-3 px-4 text-left text-sm font-semibold text-gray-700 border-b">Total Deaths</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200">
                                        <tr>
                                            <td class="py-3 px-4 text-sm font-medium text-gray-900">1</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">Other respiratory</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">70</td>
                                        </tr>
                                        <tr>
                                            <td class="py-3 px-4 text-sm font-medium text-gray-900">2</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">TB</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">54</td>
                                        </tr>
                                        <tr>
                                            <td class="py-3 px-4 text-sm font-medium text-gray-900">3</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">Malaria</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">44</td>
                                        </tr>
                                        <tr>
                                            <td class="py-3 px-4 text-sm font-medium text-gray-900">4</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">Heart disease</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">-</td>
                                        </tr>
                                        <tr>
                                            <td class="py-3 px-4 text-sm font-medium text-gray-900">5</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">Typhoid</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">09</td>
                                        </tr>
                                        <tr>
                                            <td class="py-3 px-4 text-sm font-medium text-gray-900">6</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">Tribal Fights</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">97</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <!-- Health Facilities -->
                            <div class="font-bold text-lg mt-6 mb-3 text-wabag-green border-b pb-2">Health Facilities</div>
                            <div class="mb-4 leading-relaxed">
                                Wabag District has a Provincial Hospital, a District Hospital, four Health Centers, and 40 Aid Posts providing basic healthcare. Most facilities are government-run, with some managed by NGOs and churches. All facilities are operational except for some Aid Posts that are currently closed. Wabag DDA plans to renovate or rebuild closed facilities.
                            </div>

                            <!-- Table 10 -->
                            <div class="font-semibold text-lg mt-6 mb-2 text-gray-700">Table 10: Health facilities in the district</div>
                            <div class="overflow-x-auto mb-6">
                                <table class="min-w-full">
                                    <thead>
                                        <tr class="bg-gray-50">
                                            <th class="py-3 px-4 text-left text-sm font-semibold text-gray-700 border-b">No.</th>
                                            <th class="py-3 px-4 text-left text-sm font-semibold text-gray-700 border-b">Name of Facility</th>
                                            <th class="py-3 px-4 text-left text-sm font-semibold text-gray-700 border-b">Agency</th>
                                            <th class="py-3 px-4 text-left text-sm font-semibold text-gray-700 border-b">Remarks</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200">
                                        <tr>
                                            <td colspan="4" class="py-3 px-4 text-sm font-semibold text-gray-900 bg-gray-100">Provincial Hospital</td>
                                        </tr>
                                        <tr>
                                            <td class="py-3 px-4 text-sm font-medium text-gray-900">01</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">Wabag General Hospital</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">Govt</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">In full operation</td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" class="py-3 px-4 text-sm font-semibold text-gray-900 bg-gray-100">District Hospital</td>
                                        </tr>
                                        <tr>
                                            <td class="py-3 px-4 text-sm font-medium text-gray-900">01</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">Sopas District Hospital</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">Govt</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">Will come in full operation soon</td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" class="py-3 px-4 text-sm font-semibold text-gray-900 bg-gray-100">Health Centers</td>
                                        </tr>
                                        <tr>
                                            <td class="py-3 px-4 text-sm font-medium text-gray-900">1</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">Lakopenda Health Center</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">Govt</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">In full operation</td>
                                        </tr>
                                        <tr>
                                            <td class="py-3 px-4 text-sm font-medium text-gray-900">2</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">Pasalagus Health Centre</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">Govt</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">In full operation</td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" class="py-3 px-4 text-sm font-semibold text-gray-900 bg-gray-100">Aid Posts</td>
                                        </tr>
                                        <tr>
                                            <td class="py-3 px-4 text-sm font-medium text-gray-900">1.</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">Kopen AP</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">Catholic</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">Open</td>
                                        </tr>
                                        <tr>
                                            <td class="py-3 px-4 text-sm font-medium text-gray-900">2.</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">Teremanda AP</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">SDA</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">Open</td>
                                        </tr>
                                        <tr>
                                            <td class="py-3 px-4 text-sm font-medium text-gray-900">3.</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">Warumanda AP</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">Government</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">Open</td>
                                        </tr>
                                        <tr>
                                            <td class="py-3 px-4 text-sm font-medium text-gray-900">4.</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">Sangurap AP</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">Catholic</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">Open</td>
                                        </tr>
                                        <tr>
                                            <td class="py-3 px-4 text-sm font-medium text-gray-900">5.</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">Birip AP</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">Government</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">Open</td>
                                        </tr>
                                        <tr>
                                            <td class="py-3 px-4 text-sm font-medium text-gray-900">6.</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">Imi Wei AP</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">Government</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">Open</td>
                                        </tr>
                                        <tr>
                                            <td class="py-3 px-4 text-sm font-medium text-gray-900">7.</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">Irelya AP</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">Government</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">Closed</td>
                                        </tr>
                                        <tr>
                                            <td class="py-3 px-4 text-sm font-medium text-gray-900">8.</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">Katiol AP</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">Government</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">Open</td>
                                        </tr>
                                        <tr>
                                            <td class="py-3 px-4 text-sm font-medium text-gray-900">9.</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">Kopemale AP</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">Government</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">Closed</td>
                                        </tr>
                                        <tr>
                                            <td class="py-3 px-4 text-sm font-medium text-gray-900">10.</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">Kupen AP</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">Government</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">Open</td>
                                        </tr>
                                        <tr>
                                            <td class="py-3 px-4 text-sm font-medium text-gray-900">11.</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">Lakolam AP</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">Government</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">Open</td>
                                        </tr>
                                        <tr>
                                            <td class="py-3 px-4 text-sm font-medium text-gray-900">12.</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">Naputes AP</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">Government</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">Closed</td>
                                        </tr>
                                        <tr>
                                            <td class="py-3 px-4 text-sm font-medium text-gray-900">13.</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">Rakamanda AP</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">Government</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">Closed</td>
                                        </tr>
                                        <tr>
                                            <td class="py-3 px-4 text-sm font-medium text-gray-900">14.</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">Sakarip AP</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">Government</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">Closed</td>
                                        </tr>
                                        <tr>
                                            <td class="py-3 px-4 text-sm font-medium text-gray-900">15.</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">Sari AP</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">Catholic</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">Open</td>
                                        </tr>
                                        <tr>
                                            <td class="py-3 px-4 text-sm font-medium text-gray-900">16.</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">Tumbliam AP</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">Government</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">Open</td>
                                        </tr>
                                        <tr>
                                            <td class="py-3 px-4 text-sm font-medium text-gray-900">17.</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">Yangianda AP</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">Government</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">Closed</td>
                                        </tr>
                                        <tr>
                                            <td class="py-3 px-4 text-sm font-medium text-gray-900">18.</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">Yokomanda AP</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">Government</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">Closed</td>
                                        </tr>
                                        <tr>
                                            <td class="py-3 px-4 text-sm font-medium text-gray-900">19.</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">Takenda AP</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">Government</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">Closed</td>
                                        </tr>
                                        <tr>
                                            <td class="py-3 px-4 text-sm font-medium text-gray-900">20.</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">Sangurap UC</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">Catholic</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">Open</td>
                                        </tr>
                                        <tr>
                                            <td class="py-3 px-4 text-sm font-medium text-gray-900">21.</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">Irelep</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">SDA</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">Open</td>
                                        </tr>
                                        <tr>
                                            <td class="py-3 px-4 text-sm font-medium text-gray-900">1</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">Malaumanda</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">Government</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">Closed</td>
                                        </tr>
                                        <tr>
                                            <td class="py-3 px-4 text-sm font-medium text-gray-900">2</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">Nelyauk</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">Government</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">Closed</td>
                                        </tr>
                                        <tr>
                                            <td class="py-3 px-4 text-sm font-medium text-gray-900">3</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">Biak</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">Government</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">Closed</td>
                                        </tr>
                                        <tr>
                                            <td class="py-3 px-4 text-sm font-medium text-gray-900">4</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">Kaiamtok</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">Government</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">Closed</td>
                                        </tr>
                                        <tr>
                                            <td class="py-3 px-4 text-sm font-medium text-gray-900">5</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">Pendle</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">Government</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">Closed</td>
                                        </tr>
                                        <tr>
                                            <td class="py-3 px-4 text-sm font-medium text-gray-900">6</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">Pokale</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">Government</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">Closed</td>
                                        </tr>
                                        <tr>
                                            <td class="py-3 px-4 text-sm font-medium text-gray-900">7</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">Warakom</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">Government</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">Closed</td>
                                        </tr>
                                        <tr>
                                            <td class="py-3 px-4 text-sm font-medium text-gray-900">8</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">Ilya</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">Government</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">Closed</td>
                                        </tr>
                                        <tr>
                                            <td class="py-3 px-4 text-sm font-medium text-gray-900">9</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">Kerai</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">Government</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">Closed</td>
                                        </tr>
                                        <tr>
                                            <td class="py-3 px-4 text-sm font-medium text-gray-900">10</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">Pai</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">Government</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">Closed</td>
                                        </tr>
                                        <tr>
                                            <td class="py-3 px-4 text-sm font-medium text-gray-900">11</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">Tongori</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">Government</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">Closed</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <!-- Staff Section -->
                            <div class="font-bold text-lg mt-6 mb-3 text-wabag-green border-b pb-2">Staff</div>
                            <div class="mb-4 leading-relaxed">
                                The Wabag DDA has only two health positions: District Health Officer and District Nursing Officer. All other staff are employed by the provincial health authority. Staff numbers are higher than other districts due to the provincial referral hospital being located in Wabag. Staffing levels follow standard requirements per facility type.
                            </div>

                            <!-- Equipment Section -->
                            <div class="font-bold text-lg mt-6 mb-3 text-wabag-green border-b pb-2">Equipment and Consumables Inventory</div>
                            <div class="mb-4 leading-relaxed">
                                A proper inventory needs to be conducted across all district health facilities to verify they meet minimum requirements per National Health Standards.
                            </div>

                            <!-- District Facilities and Standards -->
                            <div class="font-bold text-lg mt-6 mb-3 text-wabag-green border-b pb-2">District Facilities and Standards</div>
                            <div class="mb-4 leading-relaxed">
                                All facilities will be assessed to ensure they meet minimum requirements in:
                            </div>
                            <ul class="list-disc pl-5 mb-4 space-y-1">
                                <li>Staff strength and specialties</li>
                                <li>Equipment availability</li>
                                <li>Population served</li>
                                <li>Funding allocation</li>
                            </ul>
                        </div>
                    </div>
                </article>
            </div>

            <!-- Sidebar (1/3 width) -->
            <div class="lg:w-1/3">
                <div class="space-y-6 sticky top-6">
                    <!-- Sectoral Profiles -->
                    <div class="bg-wabag-green/5 p-6 rounded-xl border border-wabag-green/20">
                        <h3 class="text-xl font-serif font-bold text-wabag-green mb-4">Sectoral Profile Links</h3>
                        <div class="space-y-3">
                            <a href="{{ route('sectoral-profile.health') }}" class="flex items-center {{ request()->routeIs('sectoral-profile.health') ? 'bg-yellow-50 border-yellow-200' : 'bg-white border-gray-200' }} p-3 rounded-lg border hover:border-yellow-400 transition group sector-link">
                                <div class="w-10 h-10 rounded-full bg-yellow-100 flex items-center justify-center mr-3 group-hover:bg-green-200 transition">
                                    <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-medium text-gray-800 group-hover:text-green-700 transition">Health Sector</h4>
                                    <p class="text-xs text-gray-500 mt-1">Healthcare infrastructure and services</p>
                                </div>
                            </a>
                            <a href="{{ route('sectoral-profile.education') }}" class="flex items-center {{ request()->routeIs('sectoral-profile.education') ? 'bg-green-50 border-wabag-green' : 'bg-white border-gray-200' }} p-3 rounded-lg border hover:border-wabag-green transition group sector-link">
                                <div class="w-10 h-10 rounded-full {{ request()->routeIs('sectoral-profile.education') ? 'bg-green-200' : 'bg-green-100' }} flex items-center justify-center mr-3 group-hover:bg-green-200 transition">
                                    <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0v6"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-medium {{ request()->routeIs('sectoral-profile.education') ? 'text-wabag-green' : 'text-gray-800' }} group-hover:text-wabag-green transition">Education Sector</h4>
                                    <p class="text-xs text-gray-500 mt-1">Schools and learning facilities</p>
                                </div>
                            </a>
                            <a href="{{ route('sectoral-profile.community-development') }}" class="flex items-center {{ request()->routeIs('sectoral-profile.community-development') ? 'bg-blue-50 border-blue-200' : 'bg-white border-gray-200' }} p-3 rounded-lg border hover:border-wabag-green transition group sector-link">
                                <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center mr-3 group-hover:bg-blue-200 transition">
                                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-medium text-gray-800 group-hover:text-wabag-green transition">Community Development</h4>
                                    <p class="text-xs text-gray-500 mt-1">Social programs and community initiatives</p>
                                </div>
                            </a>
                            <a href="#" class="flex items-center {{ request()->routeIs('sectoral-profile.infrastructure') ? 'bg-orange-50 border-orange-200' : 'bg-white border-gray-200' }} p-3 rounded-lg border hover:border-wabag-green transition group sector-link">
                                <div class="w-10 h-10 rounded-full bg-orange-100 flex items-center justify-center mr-3 group-hover:bg-orange-200 transition">
                                    <svg class="w-5 h-5 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-medium text-gray-800 group-hover:text-wabag-green transition">Infrastructure</h4>
                                    <p class="text-xs text-gray-500 mt-1">Roads, bridges and public facilities</p>
                                </div>
                            </a>
                            <a href="#" class="flex items-center {{ request()->routeIs('sectoral-profile.economic-development') ? 'bg-purple-50 border-purple-200' : 'bg-white border-gray-200' }} p-3 rounded-lg border hover:border-wabag-green transition group sector-link">
                                <div class="w-10 h-10 rounded-full bg-purple-100 flex items-center justify-center mr-3 group-hover:bg-purple-200 transition">
                                    <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-medium text-gray-800 group-hover:text-wabag-green transition">Economic Development</h4>
                                    <p class="text-xs text-gray-500 mt-1">Business growth and employment</p>
                                </div>
                            </a>
                        </div>
                    </div>

                    <!-- Quick Stats -->
                    <div class="bg-yellow-50 p-6 rounded-xl border border-yellow-200">
                        <h3 class="text-xl font-serif font-bold text-green-800 mb-4">Key Health Stats</h3>
                        <div class="space-y-3">
                            <div class="flex justify-between border-b pb-2">
                                <span class="text-gray-600">Infant Mortality</span>
                                <span class="font-semibold">81 per 1000</span>
                            </div>
                            <div class="flex justify-between border-b pb-2">
                                <span class="text-gray-600">Maternal Mortality</span>
                                <span class="font-semibold">12 per 100,000</span>
                            </div>
                            <div class="flex justify-between border-b pb-2">
                                <span class="text-gray-600">Life Expectancy (M)</span>
                                <span class="font-semibold">57 years</span>
                            </div>
                            <div class="flex justify-between border-b pb-2">
                                <span class="text-gray-600">Life Expectancy (F)</span>
                                <span class="font-semibold">53-60 years</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Aid Posts</span>
                                <span class="font-semibold">40</span>
                            </div>
                        </div>
                    </div>

                    <!-- Contact -->
                    <div class="bg-gray-50 p-6 rounded-xl border border-gray-200">
                        <h3 class="text-xl font-serif font-bold text-wabag-green mb-4">Contact Health Division</h3>
                        <div class="space-y-2 text-sm">
                            <div class="flex items-start">
                                <svg class="w-5 h-5 text-wabag-green mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                </svg>
                                <span>+675 123 4567</span>
                            </div>
                            <div class="flex items-start">
                                <svg class="w-5 h-5 text-wabag-green mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                                <span>health@wabagdda.gov.pg</span>
                            </div>
                            <div class="flex items-start">
                                <svg class="w-5 h-5 text-wabag-green mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                <span>Wabag District Headquarters, Enga Province</span>
                            </div>
                        </div>
                    </div>

                    <!-- Resources -->
                    <div class="bg-gray-50 p-6 rounded-xl border border-gray-200">
                        <h3 class="text-xl font-serif font-bold text-wabag-green mb-4">Resources</h3>
                        <div class="space-y-3">
                            <a href="#" class="flex items-center text-wabag-green hover:text-green-800 group transition">
                                <svg class="w-5 h-5 mr-2 text-gray-400 group-hover:text-wabag-green transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                Provincial Health Plan
                            </a>
                            <a href="#" class="flex items-center text-wabag-green hover:text-green-800 group transition">
                                <svg class="w-5 h-5 mr-2 text-gray-400 group-hover:text-wabag-green transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                Health Facilities Report
                            </a>
                            <a href="#" class="flex items-center text-wabag-green hover:text-green-800 group transition">
                                <svg class="w-5 h-5 mr-2 text-gray-400 group-hover:text-wabag-green transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                Disease Prevention Guide
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@push('styles')
<style>
        .formatted-content h2,
        .formatted-content h3,
        .formatted-content h4 {
            color: #065f46;
        }

        .formatted-content table {
            border-radius: 0.5rem;
            overflow: hidden;
            box-shadow: 0 1px 3px rgba(0,0,0,0.05);
        }

        .formatted-content th {
            background-color: #f0fdf4;
            font-weight: 600;
            color: #065f46;
        }

        .formatted-content tr:nth-child(even) {
            background-color: #f9fafb;
        }

        .formatted-content tr:hover {
            background-color: #f0fdf4;
        }

        .sector-link {
            transition: all 0.3s ease;
        }
        .sector-link:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
        }

        /* Custom styles for sector links */
    .sector-link {
        transition: all 0.3s ease;
    }
    .sector-link:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 6px rgba(0,0,0,0.05);
    }
    </style>
@endpush
