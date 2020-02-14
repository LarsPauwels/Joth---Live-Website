let container = document.getElementById("events__container");

class Eventbrite {
	constructor() {
	  this.getEvents();
	}

	getEvents(data) {
		const url = "theme/Joth/ajax/Eventbrite.php";
		const current = this;

		axios.get(url)
		.then(function (response) {
		  if (response.data.status_code == 200) {
		  	console.log(response.data.status + ": " + response.data.message);
		  	current.writeEvents(response.data);
		  } else {
		  	console.log(response.data.message);
		  }
		})
		.catch(function (error) {
		  console.log(error);
		});
	}

	writeEvents(response) {
		response.data.events.forEach(function(event){
		  let title, description, date, image, button;
			title = event.name.text;
			description = event.description.text;
			date = event.start.local + " - " + event.end.local
			image = event.logo.url;
			button = event.url;
		
			let html = `
				<div class="event">
					<h1 class="events_title">
						${title}
					</h1>
					<p class="event__description">
						${description}
					</p>
					<p class="event__date">
						${date}
					</p>
					<img src="${image}" class="event__image">
					<a href="${button}" target="_blank">schrijf je in</a>
				</div>
				`;
			container.innerHTML += html;
		});
	}
}

let eventbrite = new Eventbrite();