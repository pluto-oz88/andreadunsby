<!DOCTYPE html>
<html>

<head>
  <title>Device Orientation</title>
  <script>
    // debugger;
    let lastOrient;
    let changeO;
    let thisOrient;

    // Function to detect orientation
    function detectOrientation() {

      thisOrient = window.innerHeight > window.innerWidth ? "portrait" : "landscape";
      if (lastOrient == thisOrient) {
        changeO = 0;
      } else {
        changeO = 1;
        lastOrient = thisOrient;
      }
      return thisOrient;
    }

    // Function to send orientation to processO.php and update the page
    function sendOrientationToPHP() {
      // debugger;
      // Detect the orientation
      const orientation = detectOrientation();
      if (changeO === 0) {
        return; //No change in orientation
      }

      // Send the orientation to processO.php
      fetch(`/processO.php?phoneO=${orientation}`)
        .then(response => {
          if (!response.ok) {
            throw new Error("Network response was not ok");
          }
          return response.text();
        })
        .then(data => {
          // Update the content in the output div
          document.getElementById("output").innerHTML = data;
        })
        .catch(error => {
          console.error("Error:", error);
          document.getElementById("output").innerHTML = "Error fetching orientation.";
        });
    }

    // Send orientation on page load
    window.addEventListener("load", sendOrientationToPHP);

    // Update orientation on resize
    window.addEventListener("resize", sendOrientationToPHP);
  </script>
</head>

<body>
  <h1>Device Orientation Detection</h1>
  <div id="output">Detecting orientation...</div>
</body>

</html>