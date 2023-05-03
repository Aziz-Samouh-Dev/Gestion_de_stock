@extends('layout.layout')

@section('title', 'état de Stock')

@section('content')
    <div class="p-4 sm:ml-64 bg-gray-200 min-h-screen">
        <div class="border-2 rounded-lg shadow-lg bg-white">
            
            <div class="relative overflow-x-auto shadow-md  p-3 ">
                <div class=" px-4 ">
                    <h1 class="text-2xl font-bold antialiased pb-3 pt-6 text-green-600 ">état de Stock</h1>
                </div>
                  <div class="py-3 flex justify-end">
                        <a href="#">
                            <button id="dropdownActionButton" onclick="exportTable()"
                                class="inline-flex items-center text-gray-100 bg-green-700 focus:ring-4 font-medium rounded-lg text-sm py-3 px-8 "
                                type="button">
                                <span class="sr-only">Export Table </span>
                                Export Table
                            </button>
                        </a>
                    </div>
                <table id="my-table" class="w-full text-sm text-left text-gray-500 border mb-5 bg-dark">
                    <thead class="text-xs text-gray-100 uppercase bg-gray-500 px-4">
                        <tr>
                            <th scope="col" class="px-6 py-3 ">
                                Nom Produit
                            </th>
                            <th scope="col" class="px-4 py-3">
                                Ref
                            </th>
                            <th scope="col" class="px-4 py-3">
                                Date D'Entrée
                            </th>
                            <th scope="col" class="px-4 py-3">
                                Qte debut 
                            </th>
                  
                            <th scope="col" class="px-4 py-3">
                                Qte Total
                            </th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($produits as $item )
                            
                        <tr class="bg-white border-b">
                            <th scope="row" class="px-6 py-4 text-gray-900 whitespace-nowrap ">
                                <div class="text-base font-semibold">
                                    {{ $item->nom_p  }}
                                </div>
                            </th>
                            <td class="px-4 py-3">
                                {{ $item->ref_p  }}
                            </td>
                            <td class="px-4 py-3">
                                {{ $item->date_enter }}
                            </td>
                            <td class="px-4 py-3">
                                {{ $item->qte_p  }}
                            </td>
                            <td class="px-4 py-3">
                                {{ $item->qte_p }}
                            </td>
                           
                        </tr>
                        @endforeach
                    </tbody>
                </table>
               

            </div>
        </div>
    </div>
    <!-- HTML table -->

  

<!-- Export button -->

<script>
  function exportTable() {
    // Get table element
    var table = document.getElementById("my-table");

    // Create a new Blob object from table data
    var blob = new Blob([table.outerHTML], {
      type: "application/vnd.ms-excel"
    });

    // Create a new anchor element for download
    var anchor = document.createElement("a");
    anchor.href = window.URL.createObjectURL(blob);
    anchor.download = "table-data.xls";

    // Trigger a click event on the anchor element to download the file
    anchor.click();
  }
</script>
@endsection
