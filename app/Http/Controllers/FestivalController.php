
    public function edit(Festival $festival)
    {
        return view('festivals.edit', compact('festival'));
    }

    public function update(Request $request, Festival $festival)
    {
        $request->validate([
            'naam' => 'required',
            'locatie' => 'required',
            'genre' => 'required',
            'datum' => 'required|date',
            'beschrijving' => 'nullable',
        ]);

        $festival->update($request->all());
        return redirect()->route('festivals.index');
    }

    public function destroy(Festival $festival)
    {
        $festival->delete();
        return redirect()->route('festivals.index');
    }
