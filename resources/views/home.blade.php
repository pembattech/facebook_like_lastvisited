@extends('layouts.app')

<body>

    <!-- Example sections -->
    <section id="home" style="height: 100vh; background-color: lightblue;">
        <h2>Home Section</h2>
        <p>Click to set as last visited section.</p>
    </section>

    <section id="profile" style="height: 100vh; background-color: lightgreen;">
        <h2>Profile Section</h2>
        <p>Click to set as last visited section.</p>
    </section>

    <section id="settings" style="height: 100vh; background-color: lightcoral;">
        <h2>Settings Section</h2>
        <p>Click to set as last visited section.</p>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            const sections = document.querySelectorAll('section');

            sections.forEach(section => {
                section.addEventListener('click', () => {
                    const lastSection = section.id;
                    sessionStorage.setItem('lastSection', lastSection);

                    fetch('/update-last-section', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector(
                                'meta[name="csrf-token"]').getAttribute('content')
                        },
                        body: JSON.stringify({
                            last_section: lastSection
                        })
                    });
                });
            });

            const lastSection = sessionStorage.getItem('lastSection');
            if (lastSection) {
                document.getElementById(lastSection).scrollIntoView();
            }
        });
    </script>

</body>

</html>
