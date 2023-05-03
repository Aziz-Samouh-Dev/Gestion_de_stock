@extends('layout.layout')

@section('title', 'Sortie produit')

@section('content')
    <div class=" p-4 sm:ml-64 bg-gray-200 min-h-screen">

        {{-- Add service & Agent & Produits --}}
        <div id="initialView" style="display: block;">
            <div class="border-2 rounded-lg shadow-lg bg-white ">
                <div class="relative overflow-x-auto  p-3 grid   ">
                    {{-- title --}}
                    <div class=" px-4 mb-4">
                        <h1 class="text-2xl font-bold antialiased pb-3 pt-6 text-green-600 ">Sortir Produit</h1>
                    </div>
                    <div class=" flex flex-wrap">
                        <div class="w-full px-3 grid grid-cols-2 gap-4 ">
                            <div class="mb-5">
                                <label for="prenom_agent" class="pl-3 mb-3 block text-base font-medium text-[#07074D]">
                                    Nom Service
                                </label>


                                <select id="serviceSelect"
                                    class="w-full  rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
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
                                <select id="agent" name="agents"
                                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
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
                            <button id="dropdownActionButton" onclick="switchViews()"
                                class="inline-flex items-center text-gray-100 bg-green-700 focus:ring-4 font-medium rounded-lg text-sm py-3 px-8 "
                                type="button">
                                <span class="sr-only">Ajouter au tableau </span>
                                Ajouter au tableau
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div id="tableView" style="display: none">
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
                        <a href="#" id="alertButton">
                            <button onclick="switchViews()"
                                class="inline-flex items-center
                                text-gray-100 bg-green-700 focus:ring-4 font-medium rounded-lg text-sm py-3 px-8 "
                                type="button" id="valider">
                                <span class="sr-only">Valider </span>
                                Valider
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div id="alertContainer" class="w-full flex justify-center" style="display: none;">
            <div class="w-full flex justify-center">
                <div id="alert" class="w-full p-4 mb-4 text-green-800 border border-green-300 rounded-lg bg-green-50"
                    role="alert">

                    <div class="flex items-center justify-center">
                        <svg aria-hidden="true" class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <h3 class="text-lg font-medium">Le stock est mis à jour avec succès</h3>
                    </div>
                    <div class="mt-2 mb-4 text-sm text-center">Télécharger le décharge</div>
                    <div class="flex justify-center">
                        <a href="#" id="downloadButton">
                            <button
                                class="inline-flex items-center text-gray-100 bg-green-700 focus:ring-4 font-medium rounded-lg text-sm py-2 px-4"
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

        <div class=" py-3  min-h-screen hidden" >
            <div class=" bg-white">
                <div class="border-2 rounded-lg shadow-lg bg-white">
                    <div class="flex items-center justify-center mb-5 ">
                        <div class=" w-full p-3 ">
                            <div class=" px-4 ">
                                <h1 class="text-4xl font-bold antialiased pb-3 pt-6 text-green-600 text-center">
                                    Demande de décharge
                                </h1>
                            </div>
                            <div class="p-6 bg-white  shadowdark:bg-gray-800 ">
                                <p class="mb-2"><span class="font-bold">AGENT :</span> <span id="agentName"></span></p>
                                <p class="mb-2"><span class="font-bold">SERVICE :</span> <span id="serviceName"></span></p>
                                <p class="mb-4">Je soussigné(e), Marie Dupont, agissant en tant que représentant(e) du
                                    Département des achats, déclare avoir reçu les produits suivants en sortie de l'entrepôt
                                    :</p>
                                <ul class="list-disc list-inside mb-4">
                                </ul>
                                <p class="mb-4">Je confirme que les produits ont été vérifiés et sont en bon état au
                                    moment de la sortie de l'entrepôt. Je m'engage également à utiliser ces produits
                                    conformément aux procédures et aux règles établies par l'entreprise.</p>
                                <div class="flex justify-end">
                                    <div class="w-48 h-px bg-gray-400 mt-6 mr-2"></div>
                                    <p class="mt-4">Signature de l'agent :</p>


                                </div>
                                <div class="px-6 py-3 flex justify-end">
                                    <a href="#" id="printPageButton" class="btn btn-sm btn-primary mb-3"
                                        onclick="document.getElementById('printPageButton').style.display = 'none';window.print();"
                                        class="btn btn-md btn-primary mr-2 mb-2">
                                        <button type="button"
                                            class=" text-blue-700 hover:text-white border border-green-700 hover:bg-blue-800 focus:ring-1 focus:outline-none focus:ring-blue-500 font-medium rounded-lg text-sm px-1.5 py-1 text-center mr-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-600 dark:focus:ring-blue-800">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M6.72 13.829c-.24.03-.48.062-.72.096m.72-.096a42.415 42.415 0 0110.56 0m-10.56 0L6.34 18m10.94-4.171c.24.03.48.062.72.096m-.72-.096L17.66 18m0 0l.229 2.523a1.125 1.125 0 01-1.12 1.227H7.231c-.662 0-1.18-.568-1.12-1.227L6.34 18m11.318 0h1.091A2.25 2.25 0 0021 15.75V9.456c0-1.081-.768-2.015-1.837-2.175a48.055 48.055 0 00-1.913-.247M6.34 18H5.25A2.25 2.25 0 013 15.75V9.456c0-1.081.768-2.015 1.837-2.175a48.041 48.041 0 011.913-.247m10.5 0a48.536 48.536 0 00-10.5 0m10.5 0V3.375c0-.621-.504-1.125-1.125-1.125h-8.25c-.621 0-1.125.504-1.125 1.125v3.659M18 10.5h.008v.008H18V10.5zm-3 0h.008v.008H15V10.5z" />
                                            </svg>
                                        </button>
                                    </a>
                                    <a href="#" id="printPageButton" class="btn btn-sm btn-primary mb-3"
                                        onclick="document.getElementById('printPageButton').style.display = 'none';window.print();"
                                        class="btn btn-md btn-primary mr-2 mb-2">
                                        <i class="fas fa-print"></i>
                                    </a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script>

        function switchViews() {
            const initialView = document.getElementById('initialView');
            const tableView = document.getElementById('tableView');
            const alertContainer = document.getElementById('alertContainer');

            if (initialView.style.display === 'block') {
                // Switch from initial view to table view
                initialView.style.display = 'none';
                tableView.style.display = 'block';
            } else if (tableView.style.display === 'block') {
                // Switch from table view to alert view
                tableView.style.display = 'none';
                alertContainer.style.display = 'block';
            }
        }


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
                                <input max="${quantityLabel}" id="qte_d" value='1' type="number" min="1" class="w-24 p-2 border contrast-more:border-slate-400" />
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






    </div>
@endsection
