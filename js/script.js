document.addEventListener("DOMContentLoaded", () => {
  const tourList = document.getElementById("tour-list");

  // PHP से tours fetch करो
  fetch("php/fetch_tours.php")
    .then(res => res.json())
    .then(data => {
      tourList.innerHTML = "";
      data.forEach(tour => {
        const card = document.createElement("div");
        card.className = "tour-card";
        card.innerHTML = `
          <img src="assets/images/${tour.image}" alt="${tour.title}">
          <h3>${tour.title}</h3>
          <p>${tour.description}</p>
          <p class="price">Price: ₹${tour.price}</p>
          <a href="php/book.php?id=${tour.id}" class="btn">Book Now</a>
        `;
        tourList.appendChild(card);
      });
    })
    .catch(err => {
      tourList.innerHTML = "<p>Error loading tours.</p>";
      console.error(err);
    });
});