fetch('../app/ConnectionToDB/getCategories.php')
  .then(response => response.json())
  .then(categoryDict => {
    console.log(categoryDict); // { "1": "Phone" }

    // Наприклад, вивести всі категорії
    for (const id in categoryDict) {
      console.log(`ID: ${id}, Назва: ${categoryDict[id]}`);
    }
  });