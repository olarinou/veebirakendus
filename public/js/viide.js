var recentHash = "";
var checkHash = function() {
  var hash = document.location.hash;
  if (hash) {
    hash = hash.substr(1);
    if (hash == recentHash) {
      return;
    }
    recentHash = hash;
    loadPage(hash);
  }
}