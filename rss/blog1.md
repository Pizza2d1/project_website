<h1>
 Welcome!
</h1>
<p class="notice"><strong>This is my RSS feed page that I basically use as my blog for things that I want to just rant about whenever I'm bored, I may also include some other things later but for now this will just be a way for people to read my blog with using a browser using markdown, unless if you want to use RSS, in which you can use this URL: pizza2d1.duckdns.org/rss/rss.xml as the link</strong><br />
<button onclick="copyToClipboard()" id='changeText'>Copy RSS Link</button>
<h6>(If this looks awful that's because I only just barely started learning or I forgot about this and have been working on other stuf)</h6>

<div id="myContent" style="display:none;">https://pizza2d1.duckdns.org/rss/rss.xml</div>

<script>
function sleep(ms) {
  return new Promise(resolve => setTimeout(resolve, ms));
}
async function changeBack(paragraph) {
      await sleep(1500);
      paragraph.textContent = "Copy RSS Link";
}
function copyToClipboard() {
  const content = document.getElementById("myContent").innerText;
  let paragraph = document.getElementById("changeText");
  navigator.clipboard.writeText(content)
    .then(() => {
      paragraph.textContent = "Link Copied!";
      changeBack(paragraph);
      //alert("Content copied successfully!");
    })
    .catch(err => {
      console.error("Failed to copy: ", err);
    });
}

</script>