

function revDateStr(date){
    // console.log(date);
    let date_string = new Date(date.split("-").reverse().join("-"));
    return date_string;
}

function addOneDayIntoDate(date){
    let next_date = new Date(date.setDate(date.getDate() + 1));
    let new_date = new Date(Date.parse(next_date,"yyyy-m-d"));
    return new_date;
}