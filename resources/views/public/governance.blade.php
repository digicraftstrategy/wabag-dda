@extends('layouts.public')

@section('title', 'Political Governance | Wabag DDA')

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
                                <a href="#" class="ml-2 text-sm font-medium text-wabag-green hover:text-green-800 transition">Governance</a>
                            </div>
                        </li>
                        <li aria-current="page">
                            <div class="flex items-center">
                                <svg class="w-5 h-5 text-gray-300" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                                <span class="ml-2 text-sm font-medium text-gray-500">Political Governance</span>
                            </div>
                        </li>
                    </ol>
                </nav>

                <!-- Political Governance Content -->
                <article class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                    <header class="px-6 pt-6 pb-4">
                        <span class="inline-block bg-blue-100 text-blue-800 text-xs font-semibold px-3 py-1 rounded-full mb-4 uppercase tracking-wider">
                            Governance
                        </span>
                        <h1 class="text-3xl lg:text-4xl font-serif font-bold text-wabag-black mb-3 leading-tight">Political Governance Structure</h1>
                    </header>

                    <div class="px-6 pb-8">
                        <div class="formatted-content text-gray-700">
                            <!-- Wabag District Development Authority -->
                            <div class="font-bold text-2xl mt-6 mb-4 text-wabag-green">2.3 POLITICAL GOVERNANCE</div>

                            <div class="font-bold text-xl mt-5 mb-3 text-wabag-green border-b pb-2">Wabag District Development Authority</div>
                            <div class="mb-4 leading-relaxed">
                                Wabag District Development Authority is a statutory body replacing the Joint District Planning and Budget Priority Committee of Wabag District and has been established by Section 33A of the Organic Law on Provincial and Local-level Governments as the District Development Authority Act 2014.
                            </div>

                            <!-- Main Policy Objectives -->
                            <div class="font-bold text-lg mt-6 mb-3 text-wabag-green border-b pb-2">Main Policy Objectives</div>
                            <div class="mb-4 leading-relaxed">
                                It was basically established by the National Government in a bid to improve service delivery to the district and local ward levels thereby ensuring transparency, accountability and accessibility by the people.
                            </div>
                            <ul class="list-disc pl-5 mb-6 space-y-2">
                                <li>To make service delivery and project implementation stronger and efficient</li>
                                <li>To make public servants answerable and responsible to the district administrator who will be the CEO of the authority</li>
                                <li>To convert the JDBPC into a legal entity that can sue and be sued and enter into contracts</li>
                            </ul>

                            <!-- Relationship with Provincial Government -->
                            <div class="font-bold text-lg mt-6 mb-3 text-wabag-green border-b pb-2">Relationship with Provincial Government</div>
                            <div class="mb-4 leading-relaxed">
                                <ul class="list-disc pl-5 space-y-2">
                                    <li>It does not replace the Provincial Government</li>
                                    <li>The provincial government still provides and serves as an important coordinator of DDAs in the province and with oversight provision</li>
                                    <li>It must cooperate with the Provincial Government and perform its functions consistent with provincial government plans</li>
                                    <li>Service delivery powers and function of the authority are determined by the Minister in consultation with the authority and the PEC</li>
                                </ul>
                            </div>

                            <!-- Funding -->
                            <div class="font-bold text-lg mt-6 mb-3 text-wabag-green border-b pb-2">Funding</div>
                            <div class="mb-4 leading-relaxed">
                                <ul class="list-disc pl-5 space-y-2">
                                    <li>The authority receives District Support Grants and other monies appropriated to it</li>
                                    <li>It may receive some support from the Provincial Government</li>
                                    <li>It also gets yearly development grants called the District Services Improvement Program funds and varies from year to year depending on government cash flow situations</li>
                                </ul>
                            </div>

                            <!-- Functions -->
                            <div class="font-bold text-lg mt-6 mb-3 text-wabag-green border-b pb-2">Functions</div>
                            <div class="mb-4 leading-relaxed">
                                <ol class="list-decimal pl-5 space-y-2">
                                    <li>Does everything the Joint District Priority and Budget Committee and that means doing district planning and implementation of the plan</li>
                                    <li>Approve disbursement of the district support grant and district services improvement program</li>
                                    <li>Provide oversight and make recommendations on district planning to the Provincial and National Government</li>
                                    <li>Determine and control budget allocations for Local Level Government</li>
                                    <li>Approve local level government budgets</li>
                                    <li>Draw up 5 year rolling development plan for the district</li>
                                    <li>Review the 5-year development plan</li>
                                    <li>Undertake service delivery functions and responsibilities determined by the Minister</li>
                                    <li>Minister must consult with the Board and PEC when assigning service delivery functions</li>
                                    <li>The Minister can vary or revoke the determination</li>
                                    <li>Different authorities may have different service delivery functions depending on capacity</li>
                                </ol>
                            </div>

                            <!-- Board and Staff -->
                            <div class="font-bold text-lg mt-6 mb-3 text-wabag-green border-b pb-2">Board and Staff</div>
                            <div class="mb-4 leading-relaxed">
                                The Authority is made up of a board that governs it and staff that are delegated to the district by the provincial government. The board comprises of:
                            </div>
                            <ul class="list-disc pl-5 mb-6 space-y-2">
                                <li>Open MP as the Chairperson</li>
                                <li>Local Level Government Presidents from the district</li>
                                <li>Three other members appointed by the chairperson (At least one of which must be a woman)</li>
                            </ul>

                            <!-- Board Composition Structure -->
                            <div class="font-semibold text-lg mt-6 mb-2 text-gray-700">Graph 2: Wabag District Board Composition Structure</div>
                            <div class="bg-gray-50 p-6 rounded-lg mb-6">
                                <div class="flex flex-col items-center">
                                    <!-- Top Level - Chairman -->
                                    <div class="bg-wabag-green text-white px-6 py-3 rounded-lg shadow-md mb-6 text-center font-bold">
                                        CHAIRMAN OF DDA<br>(Wabag Member)
                                    </div>

                                    <!-- Second Level - CEO -->
                                    <div class="bg-blue-600 text-white px-4 py-2 rounded-lg shadow-sm mb-4 text-center font-semibold">
                                        CHIEF EXECUTIVE OFFICER
                                    </div>

                                    <!-- Third Level - LLG Presidents -->
                                    <div class="flex flex-wrap justify-center gap-4 mb-4">
                                        <div class="bg-yellow-100 px-4 py-2 rounded-lg border border-yellow-300 text-center font-medium">
                                            WABAG URBAN LLG PRESIDENT<br>(DDA BOARD MEMBER)
                                        </div>
                                        <div class="bg-yellow-100 px-4 py-2 rounded-lg border border-yellow-300 text-center font-medium">
                                            WABAG RURAL LLG PRESIDENT<br>(DDA BOARD MEMBER)
                                        </div>
                                        <div class="bg-yellow-100 px-4 py-2 rounded-lg border border-yellow-300 text-center font-medium">
                                            MARAMUNI LLG PRESIDENT<br>(DDA BOARD MEMBER)
                                        </div>
                                    </div>

                                    <!-- Fourth Level - Nominated Reps -->
                                    <div class="flex flex-wrap justify-center gap-4">
                                        <div class="bg-green-100 px-3 py-1 rounded-lg border border-green-300 text-center text-sm">
                                            WOMEN'S REP
                                        </div>
                                        <div class="bg-green-100 px-3 py-1 rounded-lg border border-green-300 text-center text-sm">
                                            YOUTH REP
                                        </div>
                                        <div class="bg-green-100 px-3 py-1 rounded-lg border border-green-300 text-center text-sm">
                                            BUSINESS REP
                                        </div>
                                        <div class="bg-green-100 px-3 py-1 rounded-lg border border-green-300 text-center text-sm">
                                            CHURCH REP
                                        </div>
                                        <div class="bg-green-100 px-3 py-1 rounded-lg border border-green-300 text-center text-sm">
                                            COMMUNITY REP
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Local Level Government and Councils -->
                            <div class="font-bold text-xl mt-8 mb-3 text-wabag-green border-b pb-2">Local Level Government and Councils</div>
                            <div class="mb-4 leading-relaxed">
                                The Wabag District has a total of three (3) LLGs at the moment which are Maramuni LLG, Wabag Urban and Wabag Rural. It has a total of 65 wards as indicated in the following table.
                            </div>

                            <!-- Table 2: Wabag Rural LLG Wards -->
                            <div class="font-semibold text-lg mt-6 mb-2 text-gray-700">Table 2: Names of Wabag Rural LLG Wards</div>
                            <div class="overflow-x-auto mb-6">
                                <table class="min-w-full">
                                    <thead>
                                        <tr class="bg-gray-50">
                                            <th class="py-3 px-4 text-left text-sm font-semibold text-gray-700 border-b">NO</th>
                                            <th class="py-3 px-4 text-left text-sm font-semibold text-gray-700 border-b">WARD NAME</th>
                                            <th class="py-3 px-4 text-left text-sm font-semibold text-gray-700 border-b">NO</th>
                                            <th class="py-3 px-4 text-left text-sm font-semibold text-gray-700 border-b">WARD NAME</th>
                                            <th class="py-3 px-4 text-left text-sm font-semibold text-gray-700 border-b">NO</th>
                                            <th class="py-3 px-4 text-left text-sm font-semibold text-gray-700 border-b">WARD NAME</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200">
                                        <tr>
                                            <td class="py-2 px-4 text-sm text-gray-700">1.</td>
                                            <td class="py-2 px-4 text-sm text-gray-700">Tukusanda</td>
                                            <td class="py-2 px-4 text-sm text-gray-700">16.</td>
                                            <td class="py-2 px-4 text-sm text-gray-700">Wabag</td>
                                            <td class="py-2 px-4 text-sm text-gray-700">31.</td>
                                            <td class="py-2 px-4 text-sm text-gray-700">Yokomanda</td>
                                        </tr>
                                        <tr>
                                            <td class="py-2 px-4 text-sm text-gray-700">2.</td>
                                            <td class="py-2 px-4 text-sm text-gray-700">Alpanda</td>
                                            <td class="py-2 px-4 text-sm text-gray-700">17.</td>
                                            <td class="py-2 px-4 text-sm text-gray-700">Lakemanda</td>
                                            <td class="py-2 px-4 text-sm text-gray-700">32.</td>
                                            <td class="py-2 px-4 text-sm text-gray-700">Lakopenda</td>
                                        </tr>
                                        <tr>
                                            <td class="py-2 px-4 text-sm text-gray-700">3.</td>
                                            <td class="py-2 px-4 text-sm text-gray-700">Tambitanis</td>
                                            <td class="py-2 px-4 text-sm text-gray-700">18.</td>
                                            <td class="py-2 px-4 text-sm text-gray-700">Sakales</td>
                                            <td class="py-2 px-4 text-sm text-gray-700">33.</td>
                                            <td class="py-2 px-4 text-sm text-gray-700">Yailengis</td>
                                        </tr>
                                        <!-- More rows would be added here -->
                                    </tbody>
                                </table>
                            </div>

                            <!-- Table 3: Maramuni LLG Wards -->
                            <div class="font-semibold text-lg mt-6 mb-2 text-gray-700">Table 3: Names of Maramuni LLG Wards</div>
                            <div class="overflow-x-auto mb-6">
                                <table class="min-w-full">
                                    <thead>
                                        <tr class="bg-gray-50">
                                            <th class="py-3 px-4 text-left text-sm font-semibold text-gray-700 border-b">NO</th>
                                            <th class="py-3 px-4 text-left text-sm font-semibold text-gray-700 border-b">WARD NAME</th>
                                            <th class="py-3 px-4 text-left text-sm font-semibold text-gray-700 border-b">NO</th>
                                            <th class="py-3 px-4 text-left text-sm font-semibold text-gray-700 border-b">WARD NAME</th>
                                            <th class="py-3 px-4 text-left text-sm font-semibold text-gray-700 border-b">NO</th>
                                            <th class="py-3 px-4 text-left text-sm font-semibold text-gray-700 border-b">WARD NAME</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200">
                                        <tr>
                                            <td class="py-2 px-4 text-sm text-gray-700">01</td>
                                            <td class="py-2 px-4 text-sm text-gray-700">Biak /Pai</td>
                                            <td class="py-2 px-4 text-sm text-gray-700">06</td>
                                            <td class="py-2 px-4 text-sm text-gray-700">Kaizmok</td>
                                            <td class="py-2 px-4 text-sm text-gray-700">11</td>
                                            <td class="py-2 px-4 text-sm text-gray-700">Warakom</td>
                                        </tr>
                                        <tr>
                                            <td class="py-2 px-4 text-sm text-gray-700">02</td>
                                            <td class="py-2 px-4 text-sm text-gray-700">Malaumanda /Pokale</td>
                                            <td class="py-2 px-4 text-sm text-gray-700">07</td>
                                            <td class="py-2 px-4 text-sm text-gray-700">Wangalongen</td>
                                            <td class="py-2 px-4 text-sm text-gray-700">12</td>
                                            <td class="py-2 px-4 text-sm text-gray-700">Pendle</td>
                                        </tr>
                                        <!-- More rows would be added here -->
                                    </tbody>
                                </table>
                            </div>

                            <!-- Table 4: Wabag Urban LLG Wards -->
                            <div class="font-semibold text-lg mt-6 mb-2 text-gray-700">Table 4: Names of Wabag Urban LLG Wards</div>
                            <div class="overflow-x-auto mb-6">
                                <table class="min-w-full">
                                    <thead>
                                        <tr class="bg-gray-50">
                                            <th class="py-3 px-4 text-left text-sm font-semibold text-gray-700 border-b">NO</th>
                                            <th class="py-3 px-4 text-left text-sm font-semibold text-gray-700 border-b">WARD NAME</th>
                                            <th class="py-3 px-4 text-left text-sm font-semibold text-gray-700 border-b">NO</th>
                                            <th class="py-3 px-4 text-left text-sm font-semibold text-gray-700 border-b">WARD NAME</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200">
                                        <tr>
                                            <td class="py-2 px-4 text-sm text-gray-700">01</td>
                                            <td class="py-2 px-4 text-sm text-gray-700">Police Barracks</td>
                                            <td class="py-2 px-4 text-sm text-gray-700">05</td>
                                            <td class="py-2 px-4 text-sm text-gray-700">Kecas Hidden Valley</td>
                                        </tr>
                                        <tr>
                                            <td class="py-2 px-4 text-sm text-gray-700">02</td>
                                            <td class="py-2 px-4 text-sm text-gray-700">Beat Street</td>
                                            <td class="py-2 px-4 text-sm text-gray-700">06</td>
                                            <td class="py-2 px-4 text-sm text-gray-700">Ajpus Newtown</td>
                                        </tr>
                                        <!-- More rows would be added here -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </article>
            </div>

            <!-- Sidebar (1/3 width) -->
            <div class="lg:w-1/3">
                <div class="space-y-6 sticky top-6">
                    <!-- Governance Links -->
                    <div class="bg-wabag-green/5 p-6 rounded-xl border border-wabag-green/20">
                        <h3 class="text-xl font-serif font-bold text-wabag-green mb-4">Governance Links</h3>
                        <div class="space-y-3">
                            <a href="#" class="flex items-center {{ request()->routeIs('governance.political') ? 'bg-blue-50 border-blue-200' : 'bg-white border-gray-200' }} p-3 rounded-lg border hover:border-wabag-green transition group sector-link">
                                <div class="w-10 h-10 rounded-full {{ request()->routeIs('governance.political') ? 'bg-blue-200' : 'bg-blue-100' }} flex items-center justify-center mr-3 group-hover:bg-blue-200 transition">
                                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-medium {{ request()->routeIs('governance.political') ? 'text-wabag-green' : 'text-gray-800' }} group-hover:text-wabag-green transition">Political Governance</h4>
                                    <p class="text-xs text-gray-500 mt-1">DDA structure and functions</p>
                                </div>
                            </a>
                            <a href="#" class="flex items-center {{ request()->routeIs('governance.administrative') ? 'bg-green-50 border-wabag-green' : 'bg-white border-gray-200' }} p-3 rounded-lg border hover:border-wabag-green transition group sector-link">
                                <div class="w-10 h-10 rounded-full {{ request()->routeIs('governance.administrative') ? 'bg-green-200' : 'bg-green-100' }} flex items-center justify-center mr-3 group-hover:bg-green-200 transition">
                                    <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-medium {{ request()->routeIs('governance.administrative') ? 'text-wabag-green' : 'text-gray-800' }} group-hover:text-wabag-green transition">Administrative Structure</h4>
                                    <p class="text-xs text-gray-500 mt-1">District administration</p>
                                </div>
                            </a>
                            <a href="#" class="flex items-center {{ request()->routeIs('governance.llg') ? 'bg-purple-50 border-purple-200' : 'bg-white border-gray-200' }} p-3 rounded-lg border hover:border-wabag-green transition group sector-link">
                                <div class="w-10 h-10 rounded-full bg-purple-100 flex items-center justify-center mr-3 group-hover:bg-purple-200 transition">
                                    <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-medium text-gray-800 group-hover:text-wabag-green transition">LLG Councils</h4>
                                    <p class="text-xs text-gray-500 mt-1">Local level governments</p>
                                </div>
                            </a>
                            <a href="#" class="flex items-center {{ request()->routeIs('governance.wards') ? 'bg-yellow-50 border-yellow-200' : 'bg-white border-gray-200' }} p-3 rounded-lg border hover:border-wabag-green transition group sector-link">
                                <div class="w-10 h-10 rounded-full bg-yellow-100 flex items-center justify-center mr-3 group-hover:bg-yellow-200 transition">
                                    <svg class="w-5 h-5 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-medium text-gray-800 group-hover:text-wabag-green transition">Ward Committees</h4>
                                    <p class="text-xs text-gray-500 mt-1">Community representation</p>
                                </div>
                            </a>
                        </div>
                    </div>

                    <!-- Quick Stats -->
                    <div class="bg-wabag-green/5 p-6 rounded-xl border border-wabag-green/20">
                        <h3 class="text-xl font-serif font-bold text-wabag-green mb-4">Governance Stats</h3>
                        <div class="space-y-3">
                            <div class="flex justify-between border-b pb-2">
                                <span class="text-gray-600">Local Level Governments</span>
                                <span class="font-semibold">3</span>
                            </div>
                            <div class="flex justify-between border-b pb-2">
                                <span class="text-gray-600">Total Wards</span>
                                <span class="font-semibold">65</span>
                            </div>
                            <div class="flex justify-between border-b pb-2">
                                <span class="text-gray-600">DDA Board Members</span>
                                <span class="font-semibold">7</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Wabag Rural Wards</span>
                                <span class="font-semibold">45</span>
                            </div>
                        </div>
                    </div>

                    <!-- Contact -->
                    <div class="bg-gray-50 p-6 rounded-xl border border-gray-200">
                        <h3 class="text-xl font-serif font-bold text-wabag-green mb-4">Contact DDA Office</h3>
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
                                <span>dda@wabagdda.gov.pg</span>
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
                        <h3 class="text-xl font-serif font-bold text-wabag-green mb-4">Governance Resources</h3>
                        <div class="space-y-3">
                            <a href="#" class="flex items-center text-wabag-green hover:text-green-800 group transition">
                                <svg class="w-5 h-5 mr-2 text-gray-400 group-hover:text-wabag-green transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                DDA Act 2014
                            </a>
                            <a href="#" class="flex items-center text-wabag-green hover:text-green-800 group transition">
                                <svg class="w-5 h-5 mr-2 text-gray-400 group-hover:text-wabag-green transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                LLG Administration Act
                            </a>
                            <a href="#" class="flex items-center text-wabag-green hover:text-green-800 group transition">
                                <svg class="w-5 h-5 mr-2 text-gray-400 group-hover:text-wabag-green transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                Ward Development Guidelines
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
