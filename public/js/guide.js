// guide.js
var showGuide = introJs().setOptions({
    steps: [
        {
            intro: "<strong>Welcome to Theses Kiosk!</strong> Dive into our streamlined archiving system, purpose-built for Pangasinan State University - Alaminos City Campus. This guide will walk you through essential features, ensuring a seamless experience with our innovative solution.",
        },
        {
            element: document.querySelector("#home"),
            intro: "<strong>This is the Homepage Bar</strong> Explore, upload, and stay updated on all posted theses. Your central hub for trending posts and the latest uploads your one-stop destination for academic works. Start exploring and contributing today!",
        },
        {
            element: document.querySelector("#notification"),
            intro: "<strong>Next is the Notification Bar</strong> Stay Updated with Notifications! Receive alerts for account completion, document approvals, reviews, and community engagement. Your connection to updates, approval, and community participation starts here!",
        },
        {
            element: document.querySelector("#search"),
            intro: "<strong>Next is the Search Bar</strong> <br>You have the flexibility to employ both Basic and Advanced search options.  ",
        },
        {
            element: document.querySelector("#search"),
            intro: "<strong>Basic Search</strong> <br> Use the search bar to effortlessly find studies. Input a title or keyword, and explore related studies. Additionally, check out the latest uploaded manuscripts for a quick overview.",
        },
        {
            element: document.querySelector("#search"),
            intro: "<strong>Advance Search</strong> <br> Refine your search in advanced mode. Search by publication year, language, and document type. By default, results are sorted by relevance in ascending order. Tailor your search for a more precise exploration of academic content.",
        },
        {
            element: document.querySelector("#catalogue"),
            intro: "<strong>Next is Catalogue Bar</strong><br>Discover academic works with ease on our Catalogue Page. Here, documents are neatly organized by type, offering a clear view of each department's collection.",
        },
        {
            element: document.querySelector("#bookmark"),
            intro: "<strong>Next is Bookmark Bar</strong> Bookmark your favorite theses and research projects effortlessly. Ensure your account is <strong>Verified</strong>.",
        },
        {
            element: document.querySelector("#bookmark"),
            intro: "Click <strong>Bookmark</strong> to save, <strong>Share</strong> to spread the knowledge, and <strong>View</strong> for full details. Manage bookmarks and explore seamlessly. Enjoy a streamlined experience in just a few clicks!",
        },
        {
            element: document.querySelector("#user"),
            intro: "<strong>Lastly User Bar</strong>",
        },
        {
            intro: "Explore the User Bar for quick access to your account details. Effortlessly edit your profile and verify your account. Efficiently handle your uploaded theses, giving you full control over your academic contributions. The User Bar offers a streamlined experience, tailored for straightforward account management and thesis management.",
        },
        {
            intro: "Congratulations on successfully navigating our platform! We wish you the best of luck as you explore, contribute, and manage your academic journey. Should you have any questions or need assistance, our support team is here to help. Happy exploring, and may your academic pursuits be both rewarding and fulfilling!",
        },
    ],
});

// Function to start the guide
function startGuide() {
    showGuide.start();
}
