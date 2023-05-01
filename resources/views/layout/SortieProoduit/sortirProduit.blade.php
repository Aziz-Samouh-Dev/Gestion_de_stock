@extends('layout.layout')

@section('title', 'Sortie produit')

@section('content')
    <div class=" p-4 sm:ml-64 bg-gray-200 min-h-screen">

        {{-- Add service & Agent & Produits --}}
        <div class="border-2 rounded-lg shadow-lg bg-white ">
            <div class="relative overflow-x-auto  p-3 grid grid-rows-4 gap-4  ">
                {{-- title --}}
                <div class=" px-4 ">
                    <h1 class="text-2xl font-bold antialiased pb-3 pt-6 text-green-600 ">Sortir Produit</h1>
                </div>
                <div class=" flex flex-wrap">
                    <div class="w-full px-3 grid grid-cols-2 gap-4 ">
                        <div class="mb-5">
                            <label for="prenom_agent" class="pl-3 mb-3 block text-base font-medium text-[#07074D]">
                                Nom Service
                            </label>


                            <select id="serviceSelect">
                                class="w-full  rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                                />
                                <option hidden disabled selected value=""></option>


                                @foreach ($services as $item)
                                    <option value={{ $item->id_service }}>
                                        {{ $item->nom_service }}
                                    </option>
                                @endforeach

                            </select>

                        </div>
                        <div class="mb-5">
                            <label for="prenom_agent" class="pl-3 mb-3 block text-base font-medium text-[#07074D]">
                                Nom Agents
                            </label>
                            <select id="agent" name="agents">
                                <!-- Options will be dynamically populated based on the selected id_service -->
                            </select>

                        </div>
                    </div>
                </div>
                <ul
                    class="py-3 border h-auto grid grid-cols-2 gap-4 px-3 pb-3 overflow-y-auto text-sm text-gray-700 dark:text-gray-200 lg:grid-cols-3">
                    @foreach ($produits as $item)
                        <li>
                            <div class="flex items-center p-2 rounded hover:bg-gray-100">
                                <input type="checkbox" id="checkbox-item-{{ $item->id_produit }}"
                                    class="defaultCheckbox relative flex h-[20px] min-h-[20px] w-[20px] min-w-[20px] appearance-none items-center justify-center rounded-md border border-gray-300 text-white/0 outline-none transition duration-[0.2s] checked:text-white hover:cursor-pointer checked:bg-green-600"
                                    name="weekly" />
                                <label for="checkbox-item-{{ $item->id_produit }}"
                                    class="w-full ml-2 text-sm font-medium text-gray-400 rounded">
                                    {{ $item->nom_p }}
                                </label>
                                <label for="checkbox-item-{{ $item->id_produit }}" class=" hidden">
                                    {{ $item->qte_p }}
                                </label>
                            </div>
                        </li>
                    @endforeach
                </ul>
                <div class="py-3 flex justify-end">
                    <a href="#">
                        <button id="dropdownActionButton"
                            class="inline-flex items-center text-gray-100 bg-green-700 focus:ring-4 font-medium rounded-lg text-sm py-3 px-8 "
                            type="button">
                            <span class="sr-only">Ajouter au tableau </span>
                            Ajouter au tableau
                        </button>
                    </a>
                </div>
            </div>
        </div>


        <div class="border-2 rounded-lg shadow-lg bg-white my-4 ">
            <div class="relative overflow-x-auto shadow-md  p-3 ">
                <div class=" px-4 ">
                    <h1 class="text-2xl font-bold antialiased pb-3 pt-6 text-green-600 ">List Produits</h1>
                </div>
                <table id="dataTable" class="w-full text-sm text-left text-gray-500 border mb-5 bg-dark">
                    <thead class="text-xs text-gray-100 uppercase bg-gray-500 px-4">
                        <tr>
                            <th scope="col" class="px-6 py-3">Name</th>
                            <th scope="col" class="px-4 py-3">QUANTITé actuiel</th>
                            <th scope="col" class="px-4 py-3">QUANTITé demandé</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
                <div class=" p-3 flex justify-end">
                    <a href="#">
                        <button
                            class="inline-flex items-center text-gray-100 bg-green-700 focus:ring-4 font-medium rounded-lg text-sm py-3 px-8 "
                            type="button" id="valider">
                            <span class="sr-only">Valider </span>
                            Valider
                        </button>
                    </a>
                </div>
            </div>
        </div>


        <div class="w-full flex justify-center">
            <div id="alert " class="w-full p-4 mb-4 text-green-800 border border-green-300 rounded-lg bg-green-50 "
                role="alert">
                <div class="">

                    <div class="flex items-center justify-center ">
                        <svg aria-hidden="true" class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <h3 class="text-lg font-medium"> le stock est mis à jour avec succés </h3>
                    </div>
                    <div class="mt-2 mb-4 text-sm text-center">
                        télecharger le décharge
                    </div>
                    <div class="flex justify-center">
                        <a href="#">
                            <button
                                class="inline-flex items-center text-gray-100 bg-green-700 focus:ring-4 font-medium rounded-lg text-sm py-2 px-4 "
                                type="button">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3" />
                                </svg>
                                <span class="px-2">Télécharger</span>
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        var addedProducts = []; // Array to store added product IDs
        var addedQts = []; // Array to store added product IDs

        function isProductAdded(productId) {
            return addedProducts.includes(productId);
        }

        function addProduct(productId) {
            if (isProductAdded(productId)) {
                console.log('Product is already added');
            } else {
                // Add the product to the table
                console.log('Adding product to the table');
                addedProducts.push(productId);
            }
        }


        document.getElementById('dropdownActionButton').addEventListener('click', function() {
            var checkboxes = document.querySelectorAll('input[name="weekly"]:checked');

            checkboxes.forEach(function(checkbox) {
                var productId = checkbox.id.replace('checkbox-item-', '');
                var productName = checkbox.nextElementSibling.innerText;
                var quantityLabel = checkbox.nextElementSibling.nextElementSibling.innerText;

                if (isProductAdded(productId)) {
                    var existingRow = document.querySelector(
                        `#dataTable tbody tr[data-product-id="${productId}"]`);
                    existingRow.parentNode.removeChild(existingRow);
                    addedProducts.splice(addedProducts.indexOf(productId), 1);
                } else {
                    var row = document.createElement('tr');
                    row.setAttribute('data-product-id', productId);
                    row.innerHTML = `
                <td class="px-6 py-4 text-gray-900 whitespace-nowrap">
                    <div class="text-base font-semibold">
                        ${productName}
                    </div>
                </td>
                <td class="px-4 py-3">
                    ${quantityLabel}
                </td>
                <td class="px-4 py-3 flex items-center">
                    <input max="${quantityLabel - 1}" id="qte_d" value='1' type="number" min="1" class="w-24 p-2 border contrast-more:border-slate-400" />
                </td>
            `;

                    var tableBody = document.querySelector('#dataTable tbody');
                    tableBody.appendChild(row);

                    addedProducts.push(productId);
                }
            });


        });





        document.getElementById('serviceSelect').addEventListener('change', function() {
            var serviceId = this.value; // Get the selected service ID

            // Clear the agents select options
            document.getElementById('agent').innerHTML = '';

            if (serviceId) {
                // Make an AJAX request to retrieve agents for the selected service
                var xhr = new XMLHttpRequest();
                xhr.open('GET', '/getAgents?service_id=' + serviceId, true);
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        // Process the response
                        var agents = JSON.parse(xhr.responseText);
                        // Update the UI with the retrieved agents
                        agents.forEach(function(agent) {
                            var option = document.createElement('option');
                            option.value = agent.id_agent;
                            option.text = agent.nom_agent + ' ' + agent
                                .prenom_agent;
                            document.getElementById('agent').appendChild(
                                option);
                        });
                    }
                };
                xhr.send();
            }
        });



        document.getElementById('valider').addEventListener('click', function() {
            // Iterate through the added products
            for (var i = 0; i < addedProducts.length; i++) {
                var addedProduct = addedProducts[i];
                var xhr = new XMLHttpRequest();

                // Get the qte_d input element for the current iteration
                var qte_dInput = document.getElementById('qte_d');

                if (qte_dInput !== null) {
                    var qte_dValue = qte_dInput.value;
                    console.log(qte_dValue);

                    // Set the request URL and method
                    xhr.open('POST', '/updateProduct', true);

                    // Set the request headers (if needed)
                    xhr.setRequestHeader('Content-Type', 'application/json');
                    xhr.setRequestHeader(
                        'X-CSRF-TOKEN', '{{ csrf_token() }}');

                    // Set the request payload
                    var payload = JSON.stringify({
                        id: addedProduct,
                        quantity: qte_dValue
                    });

                    // Handle the response
                    xhr.onreadystatechange = function() {
                        if (xhr.readyState === 4) {
                            if (xhr.status === 200) {
                                // Handle the successful response
                                alert('Product updated successfully');
                            } else {
                                // Handle the error response
                                alert('Failed to update product');
                            }
                        }
                    };

                    // Send the request
                    xhr.send(payload);
                }
            }
        });
    </script>

    {{-- 
    <div class="border-2 rounded-lg shadow-lg bg-white ">
        <div class="relative overflow-x-auto shadow-md  p-3 ">
            <div class=" px-4 ">
                <h1 class="text-2xl font-bold antialiased pb-3 pt-6 text-green-600 ">Sortir Produit</h1>
            </div>
            <div class="p-3 flex justify-between produit">

                <div class="flex items-center">

                    <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
                        class="text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center "
                        type="button">Services <svg class="w-4 h-4 ml-2" aria-hidden="true" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg></button>
                    <!-- Dropdown menu -->
                    <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44">
                        <ul class="py-2 text-sm text-gray-800 " aria-labelledby="dropdownDefaultButton">
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100 ">Dashboard</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100 ">Settings</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100 ">Earnings</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100 ">Sign
                                    out</a>
                            </li>
                        </ul>
                    </div>

                    <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
                        class="mx-3 text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center "
                        type="button">Agents <svg class="w-4 h-4 ml-2" aria-hidden="true" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg></button>
                    <!-- Dropdown menu -->
                    <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44">
                        <ul class="py-2 text-sm text-gray-700 " aria-labelledby="dropdownDefaultButton">
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100 ">Dashboard</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100 ">Settings</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100 ">Earnings</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100 ">Sign out</a>
                            </li>
                        </ul>
                    </div>

                </div>

                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none ">
                        <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor"
                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <input type="text" id="table-search-users"
                        class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 focus:ring-blue-500 focus:border-blue-500 outline-none "
                        placeholder="Rechercher un produit">
                </div>
            </div>
            <ul
                class="py-3 border h-auto grid grid-cols-2 gap-4 px-3 pb-3 overflow-y-auto text-sm text-gray-700 dark:text-gray-200 lg:grid-cols-3 ">
                <li>
                    <div class="flex items-center p-2 rounded hover:bg-gray-100">
                        <input type="checkbox" checked id="checkbox-item-1"
                            class="defaultCheckbox relative flex h-[20px] min-h-[20px] w-[20px] min-w-[20px] appearance-none items-center
                                                            justify-center rounded-md border border-gray-300 text-white/0 outline-none transition duration-[0.2s] checked:text-white hover:cursor-pointer checked:bg-green-600  "
                            name="weekly" />
                        <label for="checkbox-item-1" class="w-full ml-2 text-sm font-medium text-gray-400 rounded ">
                            Bonnie Green</label>
                    </div>
                </li>
                <li>
                    <div class="flex items-center p-2 rounded hover:bg-gray-100">
                        <input id="checkbox-item-2" type="checkbox" value=""
                            class="defaultCheckbox relative flex h-[20px] min-h-[20px] w-[20px] min-w-[20px] appearance-none items-center
                                                    justify-center rounded-md border border-gray-300 text-white/0 outline-none transition duration-[0.2s] checked:text-white hover:cursor-pointer checked:bg-green-600  "
                            name="weekly">
                        <label for="checkbox-item-2"
                            class="w-full ml-2 text-sm font-medium text-gray-400 rounded ">Michael
                            Gough</label>
                    </div>
                </li>
                <li>
                    <div class="flex items-center p-2 rounded hover:bg-gray-100">
                        <input id="checkbox-item-3" type="checkbox" value=""
                            class="defaultCheckbox relative flex h-[20px] min-h-[20px] w-[20px] min-w-[20px] appearance-none items-center
                                                    justify-center rounded-md border border-gray-300 text-white/0 outline-none transition duration-[0.2s] checked:text-white hover:cursor-pointer checked:bg-green-600  "
                            name="weekly">
                        <label for="checkbox-item-3" class="w-full ml-2 text-sm font-medium text-gray-400 rounded ">Robert
                            Wall</label>
                    </div>
                </li>
                <li>
                    <div class="flex items-center p-2 rounded hover:bg-gray-100">
                        <input id="checkbox-item-4" type="checkbox" value=""
                            class="defaultCheckbox relative flex h-[20px] min-h-[20px] w-[20px] min-w-[20px] appearance-none items-center
                                                    justify-center rounded-md border border-gray-300 text-white/0 outline-none transition duration-[0.2s] checked:text-white hover:cursor-pointer checked:bg-green-600  "
                            name="weekly">
                        <label for="checkbox-item-4" class="w-full ml-2 text-sm font-medium text-gray-400 rounded ">Joseph
                            Mcfall</label>
                    </div>
                </li>
                <li>
                    <div class="flex items-center p-2 rounded hover:bg-gray-100">
                        <input id="checkbox-item-5" type="checkbox" value=""
                            class="defaultCheckbox relative flex h-[20px] min-h-[20px] w-[20px] min-w-[20px] appearance-none items-center
                                                    justify-center rounded-md border border-gray-300 text-white/0 outline-none transition duration-[0.2s] checked:text-white hover:cursor-pointer checked:bg-green-600  "
                            name="weekly">
                        <label for="checkbox-item-5" class="w-full ml-2 text-sm font-medium text-gray-400 rounded ">Robert
                            Wall</label>
                    </div>
                </li>
                <li>
                    <div class="flex items-center p-2 rounded hover:bg-gray-100">
                        <input id="checkbox-item-6" type="checkbox" value=""
                            class="defaultCheckbox relative flex h-[20px] min-h-[20px] w-[20px] min-w-[20px] appearance-none items-center
                                                    justify-center rounded-md border border-gray-300 text-white/0 outline-none transition duration-[0.2s] checked:text-white hover:cursor-pointer checked:bg-green-600  "
                            name="weekly">
                        <label for="checkbox-item-6" class="w-full ml-2 text-sm font-medium text-gray-400 rounded ">Joseph
                            Mcfall</label>
                    </div>
                </li>
                <li>
                    <div class="flex items-center p-2 rounded hover:bg-gray-100">
                        <input id="checkbox-item-7" type="checkbox" value=""
                            class="defaultCheckbox relative flex h-[20px] min-h-[20px] w-[20px] min-w-[20px] appearance-none items-center
                                                    justify-center rounded-md border border-gray-300 text-white/0 outline-none transition duration-[0.2s] checked:text-white hover:cursor-pointer checked:bg-green-600  "
                            name="weekly">
                        <label for="checkbox-item-7" class="w-full ml-2 text-sm font-medium text-gray-400 rounded ">Robert
                            Wall</label>
                    </div>
                </li>
                <li>
                    <div class="flex items-center p-2 rounded hover:bg-gray-100">
                        <input id="checkbox-item-8" type="checkbox" value=""
                            class="defaultCheckbox relative flex h-[20px] min-h-[20px] w-[20px] min-w-[20px] appearance-none items-center
                                                    justify-center rounded-md border border-gray-300 text-white/0 outline-none transition duration-[0.2s] checked:text-white hover:cursor-pointer checked:bg-green-600  "
                            name="weekly">
                        <label for="checkbox-item-8" class="w-full ml-2 text-sm font-medium text-gray-400 rounded ">Joseph
                            Mcfall</label>
                    </div>
                </li>
            </ul>
            <div class="p-3 flex justify-end">
                <a href="#">
                    <button id="dropdownActionButton"
                        class="inline-flex items-center text-gray-100 bg-green-700 focus:ring-4 font-medium rounded-lg text-sm py-3 px-8 "
                        type="button">
                        <span class="sr-only">Ajouter au tableau </span>
                        Ajouter au tableau
                    </button>
                </a>
            </div>
        </div>
    </div> --}}

    {{-- Add Quantétié --}}
    {{-- <div class="border-2 rounded-lg shadow-lg bg-white my-4 ">
        <div class="relative overflow-x-auto shadow-md  p-3 ">
            <div class=" px-4 ">
                <h1 class="text-2xl font-bold antialiased pb-3 pt-6 text-green-600 ">List Produits</h1>
            </div>
            <table class="w-full text-sm text-left text-gray-500 border mb-5 bg-dark">
                <thead class="text-xs text-gray-100 uppercase bg-gray-500 px-4">
                    <tr>
                        <th scope="col" class="px-6 py-3 ">
                            Name
                        </th>
                        <th scope="col" class="px-4 py-3">
                            QUANTITé actuiel
                        </th>
                        <th scope="col" class="px-4 py-3">
                            QUANTITé demandé
                        </th>
                    </tr>
                </thead>
                <tbody>

                    <tr class="bg-white border-b">
                        <th scope="row" class="px-6 py-4 text-gray-900 whitespace-nowrap ">
                            <div class="text-base font-semibold">
                                Prod-6789
                            </div>
                        </th>
                        <td class="px-4 py-3">
                            100
                        </td>
                        <td class="px-4 py-3 flex items-center ">
                            <input type="number" min="1"
                                class="w-24 p-2 border contrast-more:border-slate-400 " />
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class=" p-3 flex justify-end">
                <a href="#">
                    <button
                        class="inline-flex items-center text-gray-100 bg-green-700 focus:ring-4 font-medium rounded-lg text-sm py-3 px-8 "
                        type="button">
                        <span class="sr-only">Valider </span>
                        Valider
                    </button>
                </a>
            </div>
        </div>
    </div> --}}

    {{-- Témécharger Exel form --}}
    {{-- <div class="w-full flex justify-center">
        <div id="alert " class="w-full p-4 mb-4 text-green-800 border border-green-300 rounded-lg bg-green-50 "
            role="alert">
            <div class="">

                <div class="flex items-center justify-center ">
                    <svg aria-hidden="true" class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <h3 class="text-lg font-medium"> le stock est mis à jour avec succés </h3>
                </div>
                <div class="mt-2 mb-4 text-sm text-center">
                    télecharger le décharge
                </div>
                <div class="flex justify-center">
                    <a href="#">
                        <button
                            class="inline-flex items-center text-gray-100 bg-green-700 focus:ring-4 font-medium rounded-lg text-sm py-2 px-4 "
                            type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3" />
                            </svg>
                            <span class="px-2">Télécharger</span>
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div> --}}
    </div>
@endsection
