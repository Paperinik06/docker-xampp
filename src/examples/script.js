async function fetchData()
{
    const url = "../api/data.php";
    try
    {
        const response = await fetch(url);
        const data = await response.json();
        console.log(data);
        return data;
    } 
    catch (error)
    {
        console.error("Errore recupero dati:", error);
        return [];
    }
}

async function populatetable()
{
    const data = fetchData();
    const data_table = document.getElementById("data-table");
    
    //pulisce il contenuto della tabella
    //data_table.innerHTML = '';
    data.array.forEach(element =>{

        const row = document.createElement('tr');
        const data1 = document.createElement('td');
        const data2 = document.createElement('td');
        const data3 = document.createElement('td');
        data1.textContent = element.data1;
        data2.textContent = element.data2;
        data3.textContent = element.data3;
        row.appendChild(data1);
        row.appendChild(data2);
        row.appendChild(data3);
        data_table.appendChild(row);
    });
}

document.getElementById("load-data-button").addEventListener("click", populatetable);