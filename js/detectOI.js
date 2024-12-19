const orientationEl = document.getElementById("orientation");
// const screenInfoEl = document.getElementById("screen-info");

// Function to get the current orientation
function getOrientation() {
  if (screen.orientation) {
    return screen.orientation.type.includes("portrait")
      ? "portrait"
      : "landscape";
  } else {
    return window.innerWidth > window.innerHeight ? "landscape" : "portrait";
  }
}

// Update the orientation and screen information
function updateScreenInfo() {
  // Screen information
  const screenWidth = screen.width;
  const screenHeight = screen.height;

  // Window inner dimensions
  const windowWidth = window.innerWidth;
  const windowHeight = window.innerHeight;

  // Device pixel ratio
  const pixelRatio = window.devicePixelRatio || 1;

  // Update screen info display
  //   screenInfoEl.innerHTML = `
  //                 Screen: ${screenWidth} x ${screenHeight}<br>
  //                 Window: ${windowWidth} x ${windowHeight}<br>
  //                 Pixel Ratio: ${pixelRatio}
  //             `;

  // Get the current orientation
  const newOrientation = getOrientation();

  // Check if orientation has actually changed
  const existingCookie = document.cookie
    .split("; ")
    .find((row) => row.startsWith("device_orientation="))
    ?.split("=")[1];

  if (newOrientation !== existingCookie) {
    // Update the cookie and reload only if the orientation has changed
    document.cookie = `device_orientation=${newOrientation}; path=/`;
    window.location.reload();
  }
}

// Check screen info on load
window.addEventListener("load", updateScreenInfo);

// Listen for resize events and orientation changes
window.addEventListener("resize", updateScreenInfo);

if (screen.orientation) {
  screen.orientation.addEventListener("change", updateScreenInfo);
}
