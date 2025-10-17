const Winamp = window.Webamp;

// All configuration options are optional.
const webamp = new Webamp({
    // Optional.
    initialTracks: [
        {
            metaData: {
                artist: "David Wise",
                title: "Donkey Kong 2 - Forest Interlude",
            },
            url: "/audio/donkey-kong.mp3",
        },
        {
            metaData: {
                artist: "Will Wood",
                title: "Tomcat Disposables",
            },
            url: "/audio/Will Wood - Tomcat Disposables.mp3",
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
            url: "/audio/Will Wood - White Noise.mp3",
        },
        {
            metaData: {
                artist: "Will Wood",
                title: "The First Step",
            },
            url: "/audio/Will_Wood_And_The_Tapeworms - The First Step.mp3",
        },
        {
            metaData: {
                artist: "Will Wood",
                title: "Cover This Song (A Little Bit Mine)",
            },
            url: "/audio/Will_Wood_And_The_Tapeworms - Cover This Song (A Little Bit Mine).mp3",
        },
        {
            metaData: {
                artist: "mekaloton",
                title: "KILLSWITCH (ft. Kasane Teto)",
            },
            url: "/audio/KILLSWITCH-kasane-teto.mp3",
        },
        {
            metaData: {
                artist: "EpicToast",
                title: "The Waters of Home Depot",
            },
            url: "/audio/waters_of_home_depot.mp3",
        },
    ],
    initialSkin: {
        url: "https://cdn.webampskins.org/skins/ece4ffbb0d5e4624a5c144dbc64fa58f.wsz"
        //url: "https://cdn.webampskins.org/skins/8dc603803aee34de6555caff820f6d7c.wsz" //kirby good
        //url: "https://cdn.webampskins.org/skins/4ac2ffccd4c609b2570d8320f6891567.wsz" //kirby aesthetic
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
