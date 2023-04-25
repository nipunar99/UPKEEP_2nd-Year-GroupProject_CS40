async function fetchSample() {
    const response = await fetch("http://localhost/upkeep/upkeep/public/Technician/Dashboard/sample");
    const data  = await response.json();

    console.log(data[5].user_id);
    return data;

}

fetchSample();