/**
 * Returns a random lat lng position within the map bounds.
 * @param {!google.maps.Map} map
 * @return {!google.maps.LatLngLiteral}
 */
const position = { lat: -33.73644199283519, lng: -53.37464262394463 };
//const position = { lat: -33.7363037, lng: -53.3745407 };

let paraisoChuiPin = null;

async function initMap() {
  // Request needed libraries.
  const { Map } = await google.maps.importLibrary("maps");
  const { AdvancedMarkerElement, PinElement } = await google.maps.importLibrary("marker");
  const map = new Map(document.getElementById("map"), {
    zoom: 16,
    center: position,
    mapId: "92e47c1f268b1850",
  });

  const paraisoChui = document.createElement("img");
  paraisoChui.src = "./assets/maps/marker.png";

  paraisoChuiPin = new PinElement({
    glyph: paraisoChui,
    scale: 1.5,
    borderColor: "rgba(0, 0, 0, 0)",
    background: "rgba(0, 0, 0, 0)",
    glyphColor: "rgba(0, 0, 0, 0)",
  });

  // Create 100 markers to animate.
  google.maps.event.addListenerOnce(map, "idle", () => {
    createMarker(map, AdvancedMarkerElement);
  });
}

function createMarker(map, AdvancedMarkerElement) {
  const advancedMarker = new AdvancedMarkerElement({
    position: position,
    content: paraisoChuiPin.element,
    title: "Paraíso Chuí",
    map: map,
  });
  const content = advancedMarker.content;
}

initMap();
