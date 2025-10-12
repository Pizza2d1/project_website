const Winamp = window.Webamp;

// All configuration options are optional.
const webamp = new Webamp({
    // Optional.
    initialTracks: [
        {
            metaData: {
                artist: "Will Wood",
                title: "Tomcat Disposables",
            },
            url: "audio/Will Wood - Tomcat Disposables.mp3",
        },
        {
            metaData: {
                artist: "Silent Hill 2",
                title: "Heavens Night",
            },
            url: "https://files.catbox.moe/6eht6w.mp3",
        },
        {
            metaData: {
                artist: "Silent Hill 2",
                title: "Alone In The Town",
            },
            url: "https://files.catbox.moe/aalvib.mp3",
        },
        {
            metaData: {
                artist: "Nagareboshi + Goreshit",
                title: "Look At Me Tenderly",
            },
            url: "https://files.catbox.moe/ohll0j.mp3",
        },
        {
            metaData: {
                artist: "Will Wood",
                title: "White Noise",
            },
            url: "audio/Will Wood - White Noise.mp3",
        },
        {
            metaData: {
                artist: "Will Wood",
                title: "The First Step",
            },
            url: "audio/Will_Wood_And_The_Tapeworms - The First Step.mp3",
        },
        {
            metaData: {
                artist: "Will Wood",
                title: "Cover This Song (A Little Bit Mine)",
            },
            url: "audio/Will_Wood_And_The_Tapeworms - Cover This Song (A Little Bit Mine).mp3",
        }
    ],
    initialSkin: {
        url: "https://cdn.webampskins.org/skins/ece4ffbb0d5e4624a5c144dbc64fa58f.wsz"
    },
});
// Render after the skin has loaded.
webamp.renderWhenReady(document.getElementById('winamp-container'));

const icon = document.getElementById('webamp-icon');

webamp.onClose(() => {
    icon.addEventListener('click', () => {
        webamp.reopen();
    });
})

webamp.play();
